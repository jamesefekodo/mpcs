<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function redirectToUserDashboard($accountType)
    {
        switch ($accountType) {
            // 0 - root, 1-admin , 2- student
            case 0:
            case 1:
            case 90:
                return redirect()->route('adminDashboard');
            case 2:
                return redirect()->route('memberDashboard');
            default:
                return $this->accessDeniedLogout();
        }
    }

    public function AuthLogout()
    {
        // Get current session ID
        $currentSessionId = Session::getId();
        $now = Carbon::now();

        Auth::logout();

        // Invalidate and regenerate the session token
        Session::invalidate();
        Session::regenerateToken();


        // Check if session driver is 'database'
        if (config('session.driver') === 'database') {
            $currentSession = DB::table('sessions')->where('id', $currentSessionId)->first();

            // If the session exists, delete it from the database
            if ($currentSession) {
                DB::table('sessions')->where('id', $currentSession->id)->delete();
            }
        }

        return redirect(url('/'))->with('success', 'Logged Out!');
    }
    public function forgotPassword()
    {
        if (!empty(Auth::check())) {
            return $this->redirectToUserDashboard(Auth::user()->account_type);
        }
        return view('utilities.pages.auth.fogortPassword');
    }
    public function requestPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::getEmailCheck($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            // Mail::to($user->email)->send(new PasswordResetMail($user));

            return redirect()->route('loginPage')->with('success', "Sent!");
        } else {
            return redirect()->back()->with('error', 'No Records Found!');
        }
    }
    public function passwordResetPage($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('utilities.pages.auth.resetPassword', $data);
        } else {
            abort(404);
        }
    }
    public function submitPasswordResetRequest($token, Request $request)
    {
        $passwordRules = [
            'required',
            'string',
            'min:8', // Minimum of 8 characters
            'regex:/[A-Z]/', // At least 1 uppercase letter
            'regex:/[a-z]/', // At least 1 lowercase letter
            'regex:/[0-9]/', // At least 1 number
            'regex:/[!@#$%^&*(),.?":{}|<>]/', // At least 1 special character
        ];

        // Validate input
        $validator = Validator::make($request->all(), [
            'password' => $passwordRules,
            'confirm_password' => 'required|string|same:password',
        ]);

        // Check validation results
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass all validation errors
                ->withInput(); // Retain user input
        }

        if ($request->password == $request->confirm_password) {
            $user = User::getTokenSingle($token);
            if (!$user) {
                return redirect()->back()->with('error', 'User record not found!');
            }

            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect()->route('loginPage')->with('success', 'Done!');
        } else {
            return redirect()->back()->with('error', 'Passwords do not match!');
        }
    }

    public function accessDeniedLogout()
    {
        // Get current session ID
        $currentSessionId = Session::getId();

        Auth::logout();

        // Invalidate and regenerate the session token
        Session::invalidate();
        Session::regenerateToken();


        // Check if session driver is 'database'
        if (config('session.driver') === 'database') {
            $currentSession = DB::table('sessions')->where('id', $currentSessionId)->first();

            // If the session exists, delete it from the database
            if ($currentSession) {
                DB::table('sessions')->where('id', $currentSession->id)->delete();
            }
        }

        return redirect(url('/'))->with('error', 'Access Denied');
    }
    public function login()
    {
        if (Auth::check()) {
            return $this->redirectToUserDashboard(
                Auth::user()->account_type
            );
        }
        return view('utilities.pages.auth.login');
    }
    public function authLogin(Request $request)
    {
        $request->validate([
            'login_id' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt(['username' => $request->login_id, 'password' => $request->password]) || Auth::attempt(['email' => $request->login_id, 'password' => $request->password],)) {
            $user = Auth::user();

            if ($user) {
                if ($user->require_login_mfa == 1) {
                    return redirect()->route('authenticateLogin');
                } else {
                    return $this->redirectToUserDashboard($user->account_type);
                }
            } else {
                return redirect()->route('AuthLogout');
            }
        } else {
            return redirect()->back()->with('error', "Invalid Credentials");
        }
    }

}
