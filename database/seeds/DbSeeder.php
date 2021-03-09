<?php

use Illuminate\Database\Seeder;

class DbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = database_path('db.sql');
        DB::unprepared(file_get_contents($sql));

    }
}
