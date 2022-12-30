<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class DBShowService
{
    public static function showModel(Model $model):JsonResponse
    {

        return response()->json(['data' => $model], 200);

    }
}
