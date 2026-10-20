<?php

use App\Models\Config\BasicSystemSetting;
use Carbon\Carbon;
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

if (!function_exists('emailSafeLogo')) {
    function emailSafeLogo(string $backgroundColor = '#f0f0f0'): string
    {
        $defaultSettings = basicSystemInfo();
        $logoPath = null;

        if (
            $defaultSettings &&
            $defaultSettings->association_logo &&
            file_exists(public_path('system/images/' . $defaultSettings->association_logo))
        ) {
            $logoPath = public_path('system/images/' . $defaultSettings->association_logo);
        } else {
            $logoPath = public_path('system/images/transcend_logo.webp');
        }

        $ext = strtolower(pathinfo($logoPath, PATHINFO_EXTENSION));
        $source = $ext === 'webp' ? imagecreatefromwebp($logoPath) : imagecreatefrompng($logoPath);

        $width = imagesx($source);
        $height = imagesy($source);

        $flattened = imagecreatetruecolor($width, $height);

        // Parse hex colour into RGB
        $hex = ltrim($backgroundColor, '#');
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $bgColor = imagecolorallocate($flattened, $r, $g, $b);

        imagefill($flattened, 0, 0, $bgColor);
        imagecopy($flattened, $source, 0, 0, 0, 0, $width, $height);

        $outputDir = public_path('system/images/email-safe');
        if (!is_dir($outputDir)) {
            @mkdir($outputDir, 0775, true);
        }

        $outputPath = $outputDir . '/logo-' . ($tenantId ?? 'default') . '-' . $hex . '.png';
        imagepng($flattened, $outputPath);

        imagedestroy($source);
        imagedestroy($flattened);

        return asset('system/images/email-safe/logo-' . ($tenantId ?? 'default') . '-' . $hex . '.png');
    }
}

// datetime formatting
if (! function_exists('formatDateTime')) {
    function formatDateTime($date, string $fallback = '-'): string
    {
        if (blank($date)) {
            return $fallback;
        }

        $date = $date instanceof Carbon
            ? $date
            : Carbon::parse($date);

        if ($date->isToday()) {
            return 'Today, ' . $date->format('h:i:s A');
        }

        if ($date->isYesterday()) {
            return 'Yesterday, ' . $date->format('h:i:s A');
        }

        return $date->format('d M Y h:i:s A');
    }
}
