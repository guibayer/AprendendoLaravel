<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            ['nome' => 'Camiseta Polo', 'preco' => 100, 'estoque' => 4, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
            ['nome' => 'Calça Jeans', 'preco' => 200, 'estoque' => 2, 'categoria_id' => 2]);
        DB::table('produtos')->insert(
            ['nome' => 'Computador', 'preco' => 1450, 'estoque' => 6, 'categoria_id' => 3]);
        DB::table('produtos')->insert(
            ['nome' => 'Camisa Social', 'preco' => 1000, 'estoque' => 1, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
            ['nome' => 'Jogos', 'preco' => 125, 'estoque' => 40, 'categoria_id' =>6]);
    }
}
