<?php

namespace App\Http\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserService
{
    public function storeUser(UserRequest $request)
    {
        $role = Role::where('name', $request->role)->first();

        $user = User::create($request->all());
        $user->assignRole($role);

        return $user;
    }
}
