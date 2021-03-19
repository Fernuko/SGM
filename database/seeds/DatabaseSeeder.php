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
        DB::table('juzgados')->insert([
            [
            'nombre' => 'Juzgado Civil de la V Nonminación - Capital',
            'telefono' => '4587557'
            ],
            [
            'nombre' => 'Juzgado Civil de la II Nonminación de Concepción',
            'telefono' => '(03865) 422-075'
            ],
            [
            'nombre' => 'Juzgado Civil de la IX Nonminación de Capital',
            'telefono' => '(0381) 422-0750'
            ],
            [
            'nombre' => 'Juzgado Civil de la X Nonminación Monteros',
            'telefono' => '(03863) 487-075'
            ],
        ]);
        DB::table('users')->insert([
            'name' => 'Mediador X',
            'email' => 'mediador@admin.net',
            'email_verified_at' => now(),
            'password' => bcrypt('mamadera'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
