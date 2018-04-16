<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'Cláudio',
                'cnpj' => '13.124.531/0893-02'
            ],
            [
                'nome' => 'Roberto',
                'cnpj' => '45.512.173/8018-49'
            ]
        ]);
    }
}
