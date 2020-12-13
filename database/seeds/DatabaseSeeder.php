<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'description' => 'Coordenador',
        ]);

        DB::table('users')->insert([
            'registration' => '2018300655',
            'category_id' => 1,
            'name' => 'Adailton Moura da Silva',
            'email' => 'adailton@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);
    }
}
