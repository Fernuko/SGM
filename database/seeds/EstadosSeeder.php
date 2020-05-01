<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            ['estado' => 'Inicio'],
            ['estado' => 'En tramite' ],
            ['estado' => 'Finalizado'],
        ]);
    }
}
