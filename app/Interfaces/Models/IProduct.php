<?php

namespace App\Interfaces\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface IProduct
{
    public function isDisponible():string;
    public function seller();
    public function transactions();

    public function categories();

}
