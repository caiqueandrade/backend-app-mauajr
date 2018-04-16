<?php

use Illuminate\Database\Seeder;

class ProjetosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            [
                'nome' => 'Patinete',
                'descricao' => 'Projeto para criar um patinete',
                'data_inicio' => '20180312',
                'status' => 0
            ],
            [
                'nome' => 'Sabão',
                'descricao' => 'Projeto para criar um sabão',
                'data_inicio' => '20180323',
                'status' => 0
            ]
        ]);
    }
}
