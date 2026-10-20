<?php

namespace App\Http\Controllers\COnfig;

use App\Http\Controllers\Controller;
use App\Models\Config\SystemPolicies\SystemPolicy;
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
        return redirect()->back()->with('error', 'hey!');
    }
}
