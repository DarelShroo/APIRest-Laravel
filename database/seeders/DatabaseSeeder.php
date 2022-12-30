<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //DB::statement('SET FOREIGN_KEYS_CHECKS = 0');
       /* User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();*/
        //DB::table('category_product') -> truncate();

        $cantidadUsuarios = 1000;
        $cantidadCategories = 30;
        $cantidadProducts = 1000;
        $cantidadTransactions = 1000;

        User::factory()
            ->count($cantidadUsuarios)
            ->create();

        Category::factory()
            ->count($cantidadCategories)
            ->create();

        Product::factory()
            ->count($cantidadProducts)
            ->create()
            ->each(
                function ($producto){
                    $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
                    $producto -> categories()->attach($categories->first());
                }
            );

        Transaction::factory()
        ->count($cantidadTransactions)
        ->create();

    }
}
