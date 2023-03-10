<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Models\User\Buyer;
use App\Services\DBIndexService;
use App\Services\DBShowService;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
    }

    /**
    * /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $buyer = Buyer::has('transactions')->findOrFail($id);

        return $this->showOne($buyer);
    }

}
