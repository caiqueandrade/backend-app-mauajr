<?php

use Illuminate\Database\Seeder;

class FaturamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faturamentos')->insert([
            [
                'valor' => 5783.00,
                'data_pagamento' => '20180214'
            ],
            [
                'valor' => 12000.00,
                'data_pagamento' => '20180204'
            ],
            [
                'valor' => 27819.00,
                'data_pagamento' => '20180217'
            ]
        ]);
    }
}
