<?php

namespace App\Interfaces\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface ISeller extends IUser
{
    public function products();
}
