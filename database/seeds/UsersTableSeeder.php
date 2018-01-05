<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users');

        $u = App\User::create([
            'name' => 'Elinardo',
            'email' => 'elinardosilva@gmail.com',
            'password' => bcrypt(123456),
        ]);

        $u = App\User::create([
            'name' => 'Admin',
            'email' => 'admin@digitalizasolucoes.com.br',
            'password' => bcrypt(123456),
        ]);


    }
}