<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManejoCuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Manejo_Cuotas')->insert([
            ['manejoCuota' => '1'],
            ['manejoCuota' => '2' ],
            ['manejoCuota' => '3'],
        ]);
    }
}
