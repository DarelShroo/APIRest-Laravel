<?php

namespace App\Models\User;

use App\Interfaces\Models\ISeller;
use App\Models\Product;

class Seller extends User implements ISeller
{

    public function products(){
        return $this->hasMany(Product::class);
    }
}
