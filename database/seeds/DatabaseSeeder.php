<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TarefasTableSeeder::class,
            NucleosDepartamentosTableSeeder::class,
            ClientesTableSeeder::class,
            FaturamentosTableSeeder::class,
            ProjetosTableSeeder::class
        ]);
    }
}
