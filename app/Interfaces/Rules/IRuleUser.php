<?php

namespace App\Interfaces\Rules;

use App\Interfaces\Models\IUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IRuleUser
{
    public static function validateStoreUser(Request $request);
    public static function validateUpdateUser(Request $request, Model $user);

}
