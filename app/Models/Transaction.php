<?php

namespace App\Models;

use App\Interfaces\Models\ITransaction;
use App\Models\User\Buyer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements ITransaction
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id'
    ];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
