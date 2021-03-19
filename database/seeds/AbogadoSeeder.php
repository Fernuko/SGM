<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbogadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Abogado::class, 80)->create();
    }
}
