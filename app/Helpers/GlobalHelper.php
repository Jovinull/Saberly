<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;


/* Instructor Approved via admin */

if (!function_exists('isApprovedUser')) {
    function isApprovedUser()
    {
        $user_id = Auth::id();
        return User::where('role', 'instructor')
            ->where('status', '1')
            ->where('id', $user_id)
            ->first();
    }
}

/** set admin sidebar active */

if (!function_exists('setSidebar')) {
    function setSidebar(array $routes): ?string
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'mm-active';
            }
        }
        return null;
    }
}
