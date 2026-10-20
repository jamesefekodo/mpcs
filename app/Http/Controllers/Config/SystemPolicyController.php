<?php

namespace App\Http\Controllers\COnfig;

use App\Http\Controllers\Controller;
use App\Models\Config\SystemPolicies\SystemPolicy;
use App\Models\Config\SystemPolicies\UserAgreedPolicy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemPolicyController extends Controller
{
    public function systemPolicies()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.read'),
            403
        );

        return view('users.admin.config.systemPolicy.systemPolicies');
    }
    public function newSystemPolicies()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.create'),
            403
        );
        return view('users.admin.config.systemPolicy.createNewSystemPolicy');
    }
    public function storeNewSystemPolicy(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.create'),
            403
        );

        $request->validate([
            'title' => 'required',
            'policy_statement' => 'required',
            'applicable_to_member' => 'required',
            'applicable_to_administrator' => 'required',
            'is_active' => 'required',
        ]);
        $policy = new SystemPolicy();
        $policy->title = trim($request->title);
        $policy->policy_statement = $request->policy_statement;
        $policy->applicable_to_member = $request->applicable_to_member;
        $policy->applicable_to_administrator = $request->applicable_to_administrator;
        $policy->is_active = $request->is_active;
        $policy->save();

        return redirect()->route('systemPolicies')->with('success', 'Done!');
    }
    public function viewSystemPolicy($slug)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.read'),
            403
        );

        $policy = SystemPolicy::where('slug', $slug)->first();
        if (!$policy) {
            return redirect()->back()->with('error', 'Policy not found!');
        }

        $data = [
            'policy' => $policy,
        ];
        return view('users.admin.config.systemPolicy.viewSystemPolicy', compact('data'));
    }
    public function editSystemPolicy($slug)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.update'),
            403
        );

        $policy = SystemPolicy::where('slug', $slug)->first();
        if (!$policy) {
            return redirect()->back()->with('error', 'Policy not found!');
        }
        $data = [
            'policy' => $policy,
        ];
        return view('users.admin.config.systemPolicy.editSystemPolicy', compact('data'));
    }
    public function updateSystemPolicy($slug, Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.update'),
            403
        );

        $policy = SystemPolicy::where('slug', $slug)->first();
        if (!$policy) {
            return redirect()->back()->with('error', 'Policy not found!');
        }
        $policy->update([
            'title' => trim($request->title),
            'policy_statement' => $request->policy_statement,
            'applicable_to_member' => $request->applicable_to_member,
            'applicable_to_administrator' => $request->applicable_to_administrator,
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('systemPolicies')->with('success', 'Done!');
    }
    public function deleteSystemPolicy($slug)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        abort_unless(
            $user->hasPermission('policy.delete'),
            403
        );

        $policy = SystemPolicy::where('slug', $slug)->first();
        if (!$policy) {
            return redirect()->back()->with('error', 'Policy not found!');
        }

        $policy->policyAgreements()->delete();
        $policy->delete();

        return redirect()->route('systemPolicies')->with('success', 'Done!');
    }
    public function manageSystemPolicyAgreement()
    {
        $user = Auth::user();
        $applicableToUserColumn = null;

        // Determine the applicable column based on account type or admin privilege
        if (in_array($user->account_type, [0, 90]) || $user->admin_privilege) {
            $applicableToUserColumn = 'applicable_to_administrator';
        } elseif ($user->account_type == 1) {
            $applicableToUserColumn = 'applicable_to_member';
        }

        // Retrieve the active system policies that are applicable to the user
        $systemPolicies = SystemPolicy::where('is_active', true)
            ->where($applicableToUserColumn, 1)
            ->get();

        // Retrieve the user's agreed policies
        $userAgreedPolicies = UserAgreedPolicy::where('username', $user->username)
            ->get()
            ->keyBy('policy'); // Key by policy slug for easier lookup

        $newPolicies = [];
        $updatedPolicies = [];
        $agreedPolicies = [];

        foreach ($systemPolicies as $policy) {
            $userAgreement = $userAgreedPolicies->get($policy->slug);

            if (!$userAgreement) {
                // Policy is in SystemPoliciesAndTerms but not agreed to by the user
                $newPolicies[] = $policy;
            } elseif ($userAgreement->agreement_status == 'updated') {
                // Policy is agreed but updated
                $updatedPolicies[] = $policy;
            } elseif ($userAgreement->agreement_status == 'agreed') {
                // Policy is agreed by the user
                $agreedPolicies[] = $policy;
            }
        }


        // Prepare data for view
        $data = [
            'newPolicies' => $newPolicies,
            'updatedPolicies' => $updatedPolicies,
            'agreedPolicies' => $agreedPolicies,
        ];

        return view('miscellaneous.policyAgreement.agreementIndex', compact('data'));
    }
    public function userAgreeToSystemPolicy(Request $request)
    {
        $request->validate([
            'policy' => 'required|exists:system_policies,slug',
            'agreement_status' => 'required|in:agreed',
        ]);

        $user = Auth::user();
        $today = Carbon::now()->toDateString();

        $policyOnceAgreed = UserAgreedPolicy::where('username', $user->username)->where('policy', $request->policy)->first();
        if ($policyOnceAgreed) {
            // Update the agreement
            $agreement = $policyOnceAgreed;
            $agreement->username = $user->username;
            $agreement->policy = $request->policy;
            $agreement->agreement_status = $request->agreement_status;
            $agreement->agreement_date = $today;
            $agreement->save();
        } else {
            // New agreement
            $agreement = new UserAgreedPolicy();
            $agreement->username = $user->username;
            $agreement->policy = $request->policy;
            $agreement->agreement_status = $request->agreement_status;
            $agreement->agreement_date = $today;
            $agreement->save();
        }
        return redirect()->back()->with('success', 'Done!');
    }
}
