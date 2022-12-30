<?php

namespace App\Interfaces\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use voku\helper\ASCII;

interface IBuyer
{
    public function transactions();
}
