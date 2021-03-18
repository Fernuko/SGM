<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManejoFormaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Manejo_Forma')->insert([
            ['manejoForma' => 'Con Beneficio'],
            ['manejoForma' => 'Honorario' ],
        ]);
    }
}
