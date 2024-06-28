<?php

namespace App\Models\configuracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    use HasFactory;

    protected $table = "aseguradoras";
    protected $fillable = [
        "razon_social",
        "nombre_comercial",
        "telefono",
        "rfc",
        "correo_contacto",
        "calle",
        "no_exterior",
        "colonia",
    ];
}
