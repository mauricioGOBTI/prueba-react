<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AseguradorasSeeder extends Seeder
{
    public function run(): void {
        DB::table('aseguradoras')->delete();

        $aseguradoras = [];
        for ($i = 0; $i < 100; $i++) {
            $aseguradoras[] = [
                "razon_social" => "aseguradora" . $i,
                "nombre_comercial" => "aseguradora" . $i,
                "telefono" => "1234567890",
                "rfc" => "1234567890",
                "correo_contacto" => "aseguradora" . $i . "@gmail.com",
                "calle" => "mirafuentes",
                "no_exterior" => "123",
                "colonia" => "centro",
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('aseguradoras')->insert($aseguradoras);
    }
}
