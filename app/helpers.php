<?php


if (!function_exists('hasRole')) {
    /**

     *
     * @param string $role
     * @return bool
     */
    function hasRole($role)
    {
        return auth()->check() && auth()->user()->roles->contains('name', $role);
    }
}

if (!function_exists('hasPermission')) {
    /**
    
     *
     * @param string $permission
     * @return bool
     */
    function hasPermission($permission)
    {
    
        if (auth()->check()) {
            
            $userPermissions = auth()->user()->roles->flatMap(function ($role) {
                return $role->permissions;
            });
    
        
            return $userPermissions->contains('name', $permission);
        }
    
        return false; 
    }
}




?>