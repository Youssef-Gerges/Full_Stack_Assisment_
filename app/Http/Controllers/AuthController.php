<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Services\ResponseFormatter;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $result = AuthService::checkUser($request['email'], $request['password']);

        if ($result) {
            $token = AuthService::generateToken($result);
            return ResponseFormatter::success(__('User logged in successfully'), ['token' => $token]);
        }

        return ResponseFormatter::error(__('Wrong Credentials'));

    }
}
