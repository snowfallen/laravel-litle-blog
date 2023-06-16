<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CheckRole
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): mixed
    {
        if ($request->user()->hasRole('admin') || $request->user()->hasRole($role)) {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
}
