<?php

namespace Database\Seeders;

use App\Models\EstadoTramite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoTramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_tramites')->insert([
            "descripcion"=>'PENDIENTE'
        ]);
        DB::table('estado_tramites')->insert([
            "descripcion"=>'ACEPTADO'
        ]);
        DB::table('estado_tramites')->insert([
            "descripcion"=>'RECHAZADO'
        ]);
    }
}
