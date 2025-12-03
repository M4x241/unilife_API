<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Universitario extends Model implements JWTSubject
{
    protected $table = 'universitarios';

    protected $fillable = [
        'cu',
        'nombres',
        'apellidos',
        'correo',
        'contrasena',
        'whatsapp',
    ];

    protected $hidden = [
        'contrasena',
    ];

    // Relationship: Products owned by this student
    public function productosVendidos()
    {
        return $this->hasMany(MarketplaceProduct::class, 'cu_owner', 'cu');
    }

    // Relationship: Products purchased by this student
    public function productosComprados()
    {
        return $this->hasMany(MarketplaceProduct::class, 'cu_comprador', 'cu');
    }

    // Accessor for full name
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }

    // JWT Methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'cu' => $this->cu,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
        ];
    }
}
