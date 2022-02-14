<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class ProductAndTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Topic::first())) {
            Topic::create(['name' => 'Análise Gráfica']);
            Topic::create(['name' => 'Análise de Fluxo']);
            Topic::create(['name' => 'Geral']);
            Topic::create(['name' => 'Mercado Americano']);
            Topic::create(['name' => 'Analise Gráfica']);
            Topic::create(['name' => 'Day Trade']);
            Topic::create(['name' => 'Swing Trade']);
            Topic::create(['name' => 'Opções']);
            Topic::create(['name' => 'Relatorios Fundamentalistas']);
            Topic::create(['name' => 'Buy And Hold']);
            Topic::create(['name' => 'Mercado Americano']);
        }

        if (is_null(Product::first())) {
            $productOne = Product::create(['name' => 'Curso de Day Trade']);
            $productOne->topics()->sync([1, 2, 3, 4]);
            $productTwo = Product::create(['name' => 'Curso de Swing Trade']);
            $productTwo->topics()->sync([3, 4, 5]);
            $productThree = Product::create(['name' => 'Curso de Analise Fundamentalista']);
            $productThree->topics()->sync([4]);
            $productFour = Product::create(['name' => 'Curso de Position Trade']);
            $productFour->topics()->sync([3, 4]);
            Product::create(['name' => 'Curso de Buy And Hold']);
            Product::create(['name' => 'Curso de Contabilidade']);
            Product::create(['name' => 'Curso de Opções']);
            $productFive = Product::create(['name' => 'Robo']);
            $productFive->topics()->sync([6, 7]);
            $productSix = Product::create(['name' => 'Assinatura']);
            $productSix->topics()->sync([6, 7, 8, 9, 10, 11]);
            Product::create(['name' => 'Clubes de Investimento']);
            Product::create(['name' => 'Corretoras']);
            Product::create(['name' => 'Fundos de Investimento']);
        }
    }
}
