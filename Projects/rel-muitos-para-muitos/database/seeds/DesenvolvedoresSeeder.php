<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'Bernardo', 'cargo' => 'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome' => 'Arthur', 'cargo' => 'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome' => 'Carlos', 'cargo' => 'Programador Jr']);
    }
}
