<?php

namespace App\Helpers\Response;

use App\Helpers\Response\ObjectResponse;

class JsonResponse
{
    public static function success($message = null, $statusCode = 200, $data = null)
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
            'success' => true,
            'data' => $data,
        ], $statusCode);
    }

    public static function error($message = null, $statusCode = 500, $errors = null)
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
            'success' => false,
            'errors' => $errors
        ], $statusCode);
    }

    public static function token($token, $data = null)
    {
        return response()->json([
            'data' => $data,
            'token_type' => 'Bearer',
            'access_token' => $token
        ], 201);
    }

    public static function fromObject(ObjectResponse $objectResponse)
    {
        return response()->json((array) $objectResponse, $objectResponse->code);
    }
}