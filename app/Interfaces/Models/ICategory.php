<?php

namespace App\Interfaces\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface ICategory
{
    public function products();
}
