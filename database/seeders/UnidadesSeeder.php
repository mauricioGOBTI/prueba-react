<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesSeeder extends Seeder
{
    public function run(): void {
        DB::table('unidades')->delete();

        $unidades = [];
        for ($i = 0; $i < 5000; $i++) {
            $unidades[] = [
                'tipo' => 'tipo ' . $i,
                'marca' => 'marca ' . $i,
                'modelo' => 'modelo ' . $i,
                'year' => 2024,
                'color' => 'color ' . $i,
                'no_serie' => 'no_serie ' . $i,
                'no_motor' => 'no_motor ' . $i,
                'kilometraje' => 1000,
                'idUnidad' => 'idUnidad ' . $i,
                'ultima_fecha_mantenimiento' => now(),
                'costo_basico_mantenimiento' => 500.00,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('unidades')->insert($unidades);
    }
}
