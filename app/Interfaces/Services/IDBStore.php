<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IDBStore
{
    public static function storeModel(Request $request, Model $model):JsonResponse;
}
