<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EstadoSeeder::class,
            TipoCierreSeeder::class,
        ]);
        factory(App\Abogado::class,30)->create();
        factory(App\Persona::class,30)->create();
    }
}
