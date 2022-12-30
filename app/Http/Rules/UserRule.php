<?php

namespace App\Http\Rules;

use App\Interfaces\Models\IUser;
use App\Interfaces\Rules\IRuleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User\User;
use Illuminate\Support\Facades\Validator;
class UserRule implements IRuleUser
{
    public static function validateStoreUser(Request $request){
        Validator::make($request -> all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ])->validate();

    }


    public static function validateUpdateUser(Request $request, Model $user)
    {

       Validator::make($request -> all(), [
            'email' => 'email|unique:users,email,'.$user->id,
            'password' => 'min:6|confirmed',
            'admin' => 'in:' . User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_REGULAR,
        ])->validate();

    }
}
