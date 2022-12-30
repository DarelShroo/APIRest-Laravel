<?php

namespace App\Interfaces\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface ITransaction
{
    public function buyer();

    public function product();
}
