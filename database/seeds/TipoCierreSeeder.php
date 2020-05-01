<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCierreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cierres')->insert([
            ['tipo_cierre' => 'EN TRAMITE'],
            ['tipo_cierre' => 'Con cierre - 1 acuerdo'],
            ['tipo_cierre' => 'Con cierre - 2 acuerdo'],
            ['tipo_cierre' => 'Con cierre - 3 acuerdo'],
            ['tipo_cierre' => 'Sin acuerdo'],
            ['tipo_cierre' => 'Incomparencia'],
            ['tipo_cierre' => 'Otros'],
            ['tipo_cierre' => 'Mediacion a distancia']
        ]);
    }
}
