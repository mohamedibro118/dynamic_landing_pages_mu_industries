<?php

namespace App\Actions\Fortify;

use App\Models\admin\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AuthAdmin
{

    public function checkauthadmin()
    {
        $request=request();
 //     dd(config('fortify.username'));
        $username = $request->post(config('fortify.username'));
        $password = $request->post('password');

        $user = Admin::where('email', $username)
            ->orWhere('username', $username)
            ->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
}
