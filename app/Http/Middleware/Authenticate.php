<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('/admin/login');
    // }
    protected function redirectTo(Request $request): ?string
    {
    if ($request->expectsJson()) {
        return null; // Allow JSON requests to handle authentication errors on the client side
    }

    // Check if the user is authenticated
    if (!$request->user()) {
        return route('login'); // Redirect unauthenticated users to the default login route
    }

    // Check the user's role
    $userRole = $request->user()->role;

    // Customize redirection based on the user's role
    if ($userRole === 'responsable') {
        return route('responsable.login'); // Redirect to the responsable login route
    } elseif ($userRole === 'admin') {
        return route('admin.login'); // Redirect to the admin login route
    } else {
        return route('login'); // Redirect other roles to the default login route
    }
}
}
