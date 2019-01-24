<?php

namespace App\Traits;

trait ApiResponseTrait
{
    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($data = [])
    {
        return response()->json([
            'success' => true,
            'result' => $data
        ]);
    }

    /**
     * @param $message
     * @param array $errors
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $errors = [], $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function failedResponse($message = 'Server failure')
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], 500);
    }
}
