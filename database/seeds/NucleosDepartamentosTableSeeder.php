<?php

use Illuminate\Database\Seeder;

class NucleosDepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nucleos_departamentos')->insert([
            ['nome'=> 'Projetos', 'nucleo_ou_departamento'=> 'Departamento'],
            ['nome'=> 'Marketing', 'nucleo_ou_departamento'=> 'Departamento'],
            ['nome'=> 'Financeiro', 'nucleo_ou_departamento'=> 'Departamento']
        ]);
    }
}
