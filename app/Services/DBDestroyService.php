<?php

namespace App\Services;

use App\Http\Controllers\ApiController;
use App\Interfaces\Services\IDBDestroy;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
class DBDestroyService extends ApiController implements IDBDestroy
{
    use ApiResponse;
    public static function destroyModel(Model $model):JsonResponse
    {

        return response()->json(['data' => $model], 200);
    }
}
