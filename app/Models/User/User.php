<?php

namespace App\Models\User;

use App\Interfaces\Models\IUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements IUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const USUARIO_VERIFICADO = 1;
    const USUARIO_NO_VERIFICADO = 0;

    const USUARIO_ADMINISTRADOR = true;
    const USUARIO_REGULAR = false;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerificado():int
    {
        return $this->verified == User::USUARIO_VERIFICADO;
    }

    public function isAdministrador():bool
    {
        return $this->verified == User::USUARIO_ADMINISTRADOR;
    }

    public static function generarVerificationToken(): string
    {
        return Str::random(40);
    }

    //MODIFICADORES nombre del método debe ser igual "set" o "get" + "Nombreatributo" + "Attribute"
    public function setNameAttribute($valor){
        $this->attributes['name'] = strtolower($valor);
    }

    public function  getNameAttribute($valor){
        //return ucfirst($valor); //Primera Letra en mayúscula
        return ucwords($valor); //Primera Letra en mayúscula de cada palabra

    }

    public function setEmailAttribute($valor){
        $this->attributes['email'] = strtolower($valor);
    }


}
