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
        
      $arrayLista = [
            'Contabilidade',
            'Extratos',
            'Licitações'
        ];       

        foreach ($arrayLista as $lista) {

            $pasta_id = \App\Pasta::create([
                'pasta' =>$lista,
            ])->id;
            
            $total_de_ano = 3;
            for ($i=0; $i < $total_de_ano; $i++) { 
                \App\SubPasta::create([
                    'subpasta' => date('Y', strtotime("+$i year")),
                    'pasta_id' => $pasta_id
                ]);
            }

        }
         
    
}
}
