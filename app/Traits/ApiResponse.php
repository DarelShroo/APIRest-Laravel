<?php

namespace App\Traits;


use Illuminate;

Trait ApiResponse
{
    private function successResponse($data, $code){
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code){
        return response()->json(['error' => $message], $code);
    }

    protected function showAll(Collection $collection, $code = 200){
        return $this->successResponse(['data' => $collection], $code);
    }

    protected function showOne(Model $instance, $code = 200){
        return $this->successResponse(['data' => $instance], $code);
    }
}
