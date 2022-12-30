<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface IDBDestroy
{
    public static function destroyModel(Model $model):JsonResponse;

}
