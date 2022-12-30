<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface IDBShow
{
    public static function showModel(Model $model):JsonResponse;

}
