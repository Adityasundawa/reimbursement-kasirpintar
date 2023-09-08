<?php

namespace App\Helpers\Response;

class ObjectResponse
{
    public static function success($message = null, $statusCode = 200, $data = null)
    {
        return (object) [
            'code' => $statusCode,
            'message' => $message,
            'success' => true,
            'data' => $data,
        ];
    }

    public static function error($message = null, $statusCode = 500, $errors = null)
    {
        return (object) [
            'code' => $statusCode,
            'message' => $message,
            'success' => false,
            'errors' => $errors
        ];
    }

    public static function token($token, $data = null)
    {
        return (object) [
            'data' => $data,
            'token_type' => 'Bearer',
            'access_token' => $token
        ];
    }
}