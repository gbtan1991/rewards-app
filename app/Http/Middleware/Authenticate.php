<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Always redirect to admin login (since only admins exist)
        return route('admin.showLoginForm');
    }
}
