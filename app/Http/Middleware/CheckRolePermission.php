<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRolePermission
{
    public function handle(Request $request, Closure $next, ...$rolesAndPermissions)
    {
        $user = $request->user();

        foreach ($rolesAndPermissions as $roleOrPermission) {
            if ($user->hasRole($roleOrPermission) || $user->hasPermissionTo($roleOrPermission)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}




?>