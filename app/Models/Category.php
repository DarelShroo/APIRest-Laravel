<?php

namespace App\Models;

use App\Interfaces\Models\ICategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model implements ICategory
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
