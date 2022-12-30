<?php

namespace App\Interfaces\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

interface IUser
{
    public function isVerificado():int;

    public function isAdministrador():bool;

    public static function generarVerificationToken():string;
}
