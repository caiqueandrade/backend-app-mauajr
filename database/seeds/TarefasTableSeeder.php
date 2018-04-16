<?php

use Illuminate\Database\Seeder;

class TarefasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefas')->insert([
            'titulo' => 'Tarefa 1',
            'descricao' => 'Tarefa 1',
            'data_inicio' => '20180415',
            'status' => 0
        ]);
    }
}
