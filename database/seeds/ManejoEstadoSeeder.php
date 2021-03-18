<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManejoEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Manejos_Estados')->insert([
            ['manejoEsrado' => 'Pagado'],
            ['manejoEstado' => 'Debe' ],
            ['manejoEstado' => 'No Pago'],
        ]);
    }
}
