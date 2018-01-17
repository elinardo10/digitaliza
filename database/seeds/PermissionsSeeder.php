<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $view_link = App\Permission::create([
            'name' => 'view_link', 
            'label' => 'visualizador de link',
            
        ]);

        $edit_link = App\Permission::create([
           'name' => 'edit_link', 
           'label' => 'editor de link',
        ]);

        $createlink = App\Permission::create([
           'name' => 'create-link', 
           'label' => 'criador de link',
        ]);

        $delete_link = App\Permission::create([
           'name' => 'delete_link', 
           'label' => 'deletador de link',
        ]);
    }
}
