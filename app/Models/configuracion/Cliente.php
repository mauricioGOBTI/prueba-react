<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'cliente',
        'nombre',
        'rfc',
        'calle',
        'num_exterior',
        'num_interior',
        'entidad_federativa',
        'municipio',
        'codigo_postal',
        'titular_area',
        'correo_titular',
        'telefono'
    ];
}
