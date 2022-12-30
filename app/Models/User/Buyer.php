<?php

namespace App\Models\User;

use App\Interfaces\Models\IBuyer;
use App\Models\Transaction;

  class Buyer extends User implements IBuyer
{
    //Comprador tiene muchas transacciones
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
