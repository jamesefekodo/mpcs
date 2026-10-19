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
}
