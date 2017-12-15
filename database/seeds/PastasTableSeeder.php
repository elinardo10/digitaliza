<?php

use Illuminate\Database\Seeder;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pastas');


         App\Pasta::create([
            'nome' => 'contabilidade',
            
        ]);

          App\Pasta::create([
            'nome' => 'extratos',
            
        ]);

           App\Pasta::create([
            'nome' => 'Licitações',
            
        ]);
    }
}
