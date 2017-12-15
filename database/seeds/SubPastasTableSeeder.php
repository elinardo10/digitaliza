<?php

use Illuminate\Database\Seeder;

class SubPastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sub_pastas');


         App\SubPasta::create([
            'nome' => '2017',
            
        ]);

          App\SubPasta::create([
            'nome' => '2018',
            
        ]);

           App\SubPasta::create([
            'nome' => '2019',
            
        ]);

           App\Pasta::create([
            'nome' => '2020',
            
        ]);
    }
}
