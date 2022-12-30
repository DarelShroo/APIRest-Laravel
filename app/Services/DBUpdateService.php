<?php

namespace App\Services;

use App\Interfaces\Services\IDBUpdate;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Http\JsonResponse;
class DBUpdateService extends Model implements IDBUpdate
{
    public static function updateModel(Model $model):JsonResponse
    {


        return  response()->json(['data' => $model], 200);
    }
}
