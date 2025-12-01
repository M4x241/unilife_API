<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $fillable = [
        'category_id',
        'nombre',
        'imagen_url',
        'cantidad',
        'precio',
    ];

    // Relationship: Belongs to a category
    public function category()
    {
        return $this->belongsTo(StoreCategory::class, 'category_id');
    }
}
