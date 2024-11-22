<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function checkUser(string $email, string $password){
        $userResult = Auth::attempt(['email' => $email, 'password' => $password]);
        if($userResult){
            return User::whereEmail($email)->first();
        }
        return false;
    }

    public static function generateToken(User $user){
        return $user->createToken('ENCRYPTED_TOKEN')->plainTextToken;
    }

}
