<?php

namespace App\Services;

use App\Interfaces\Services\IDBStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class DBStoreService extends Model implements IDBStore
{
    public static function storeModel(Request $request, Model $model):JsonResponse
    {


        return response()->json(['data' => $model], 200);
    }
}
