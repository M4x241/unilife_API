<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    protected $fillable = [
        'nombre',
    ];

    // Relationship: Products in this category
    public function products()
    {
        return $this->hasMany(StoreProduct::class, 'category_id');
    }
}
