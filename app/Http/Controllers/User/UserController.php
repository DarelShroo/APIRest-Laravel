<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Rules\UserRule;
use App\Models\User\User;
use App\Services\DBDestroyService;
use App\Services\DBIndexService;
use App\Services\DBStoreService;
use App\Services\DBUpdateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = User::all();

        return $this->showAll($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        UserRule::validateStoreUser($request);

        $request->password= bcrypt($request->password);
        $request->verified = User::USUARIO_NO_VERIFICADO;
        $request->verification_token = User::generarVerificationToken();
        $request->admin= User::USUARIO_REGULAR;

        $user = User::create($request->all());

        //TODO MODIFICAR
        return $this->showOne($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id):JsonResponse
    {
        $user = User::findOrFail($id);

        UserRule::validateUpdateUser($request, $user);

        if($request->has('name')){
            $user->name = $request->name;
        }

        if($request->has('email')){
            if($user->email != $request->email){
                $user->verified = User::USUARIO_NO_VERIFICADO;
                $user->verification_token = User::generarVerificationToken();
                $user->email = $request->email;
            }
        }

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->has('admin')){
            if(!$user->isVerificado()){
                return $this->errorResponse('Unicamente los usuarios verificados pueden
                    cambiar su valor de administrador', 409);
            }
            $user->admin = $request -> admin;
        }

        if(!$user->isDirty()){
            return $this->errorResponse( 'Se debe especificar al menos un valor diferente
           para actualizar' ,422);
        }

        $user->save();

        return $this->showOne($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user -> delete();

        return $this->showOne($user);
    }
}
