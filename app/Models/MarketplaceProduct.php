<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceProduct extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_url',
        'precio',
        'cu_owner',
        'cu_comprador',
        'status',
    ];

    // Relationship: Owner of the product
    public function owner()
    {
        return $this->belongsTo(Universitario::class, 'cu_owner', 'cu');
    }

    // Relationship: Buyer of the product
    public function comprador()
    {
        return $this->belongsTo(Universitario::class, 'cu_comprador', 'cu');
    }
}
