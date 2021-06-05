<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'name' => 'Aardbeientaart',
                    'created_at' =>  Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'category_id' => 1,
                    'quantity' => 20,
                    'price' => 1500
                ],
                [
                    'name' => 'Verjaardagskaart',
                    'created_at' =>  Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'category_id' => 2,
                    'quantity' => 50,
                    'price' => 200
                ],
                [
                    'name' => 'Kat speelgoed',
                    'created_at' =>  Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'category_id' => 3,
                    'quantity' => 5,
                    'price' => 3000
                ]
            ]
        );
    }
}
