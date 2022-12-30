<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface IDBUpdate
{
    public static function updateModel(Model $model):JsonResponse;

}
