<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            DbSeeder::class
        ]);
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'apellido' => 'Rodriguez',
        //     'nro_documento' => '84758',
        //     'direccion' => 'UAGRM',
        //     'telefono' => 12345678,
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('0120'),
        //     'rol' => 'admin',
        //     'puntos_acumulados' => 0,
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'diego',
        //     'apellido' => 'Rodriguez',
        //     'nro_documento' => '84758',
        //     'direccion' => 'UAGRM',
        //     'telefono' => 12345678,
        //     'email' => 'user1@user.com',
        //     'password' => Hash::make('0120'),
        //     'rol' => 'user',
        //     'puntos_acumulados' => 0,
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'mariela',
        //     'apellido' => 'Rodriguez',
        //     'nro_documento' => '84758',
        //     'direccion' => 'UAGRM',
        //     'telefono' => 12345678,
        //     'email' => 'user2@user.com',
        //     'password' => Hash::make('0120'),
        //     'rol' => 'user',
        //     'puntos_acumulados' => 0,
        // ]);
    }
}
