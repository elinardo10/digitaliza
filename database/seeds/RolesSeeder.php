<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Role::create([
            'name' => 'admin', 
            'label' => 'Administrador do Sistema',
            
        ]);

        $custumer = App\Role::create([
           'name' => 'cliente', 
           'label' => 'Visualizador de links',
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1],
            ['role_id' => 1, 'user_id' => 2],
            //['cidade' => 'Assis Brasil', 'estado_id' => 1],
           
        ]);
    }
}
