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
           'name' => 'custumer', 
           'label' => 'Visualizador de links',
        ]);
    }
}
