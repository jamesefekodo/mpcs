<?php

use App\Models\Config\BasicSystemSetting;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getUserType')) {
    function getUserType(): string
    {
        if (!Auth::check()) {
            return 'guest';
        }

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Root account
        |--------------------------------------------------------------------------
        */
        if ((int) $user->account_type === 90) {
            return 'root';
        }

        /*
        |--------------------------------------------------------------------------
        | Permanent admin account
        |--------------------------------------------------------------------------
        |
        | account_type = 1 means the account itself is an administrator.
        | It does not need to switch context.
        |
        */
        if ((int) $user->account_type === 0) {
            return 'admin';
        }

        /*
        |--------------------------------------------------------------------------
        | Non-member/unknown account types
        |--------------------------------------------------------------------------
        */
        if ((int) $user->account_type !== 1) {
            return 'guest';
        }

        /*
        |--------------------------------------------------------------------------
        | Member account
        |--------------------------------------------------------------------------
        |
        | A member can only switch to admin context if:
        | 1. admin_privilege is true, and
        | 2. the user still has at least one role.
        |
        */
        $canUseAdminContext = (bool) $user->admin_privilege
            && $user->roles()->exists();

        /*
        |--------------------------------------------------------------------------
        | Normal member: force personal context
        |--------------------------------------------------------------------------
        */
        if (!$canUseAdminContext) {
            if (session('user_context') !== 'personal') {
                session([
                    'user_context' => 'personal',
                ]);
            }

            return 'member';
        }

        /*
        |--------------------------------------------------------------------------
        | Member with administrative role:
        | return selected context from session
        |--------------------------------------------------------------------------
        */
        $selectedContext = session(
            'user_context',
            'personal'
        );

        /*
        |--------------------------------------------------------------------------
        | Prevent invalid context values
        |--------------------------------------------------------------------------
        */
        if (!in_array($selectedContext, ['personal', 'admin'], true)) {
            $selectedContext = 'personal';

            session([
                'user_context' => 'personal',
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Admin context selected
        |--------------------------------------------------------------------------
        */
        if ($selectedContext === 'admin') {
            return 'admin';
        }

        /*
        |--------------------------------------------------------------------------
        | Personal context selected
        |--------------------------------------------------------------------------
        */
        return 'member';
    }
}



if (!function_exists('basicSystemInfo')) {
    function basicSystemInfo()
    {
        return BasicSystemSetting::first();
    }
}


if (!function_exists('associationLogo')) {
    function associationLogo()
    {
        $defaultSettings = basicSystemInfo();

        if (
            $defaultSettings &&
            !empty($defaultSettings->association_logo) &&
            file_exists(public_path('system/images/' . $defaultSettings->association_logo))
        ) {
            return asset('system/images/' . $defaultSettings->association_logo);
        }

        return asset('system/images/transcend_logo.webp');
    }
}
