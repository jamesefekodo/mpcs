<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        // account_type 0 - root/admin, 1-member ---------- 90 - odu root
        // account_status 0 - Pending KYC or Incomplete + 2 active members and an outsider to endorse application, 1- Awaiting Review or Under Review , 2- After review (declined/blocked), 3 - Approved (Pending Payment)  Minimum Share Capital and pay a Registration Fee, 4 - Payment Verifying or Awaiting Activation, 5- Approved and active, 5 - Approved and active member , 6 - Dormant , 7 - suspended, 8 - Withdrawn, 9 -	Expelled or Terminated

        if ($user) {
            // 2 members Account
            if ($user->account_type == 1 && getUserType() === 'member') {
                $data = [
                    'member' => $user,
                ];
                return view('users.member.dashboard', compact('data'));
            }
            // 1 - Admin, 0 - root - 90 odu admin
            if (
                in_array((int) $user->account_type, [0, 90], true) || $user->admin_privilege === true
            ) {
                $data = [
                    'user' => $user,
                ];
                return view('users.admin.dashboard', compact('data'));
            }
        } else {
            return redirect()->route('accessDeniedLogout');
        }
    }
}
