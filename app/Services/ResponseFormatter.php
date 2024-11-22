<?php

namespace App\Services;

class ResponseFormatter
{
    public static function success(string $message, $data = null){
        return response()->json([
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public static function error(string $message, $data = null, int $code = 400){
        return response()->json([
            'message' => $message,
            'data' => $data
        ], $code);
    }

}
