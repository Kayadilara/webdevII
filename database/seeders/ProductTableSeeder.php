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
                'type' => 'Taart',
                'quantity' => 20,
                'price' => 1500
            ],
            [
                'name' => 'Verjaardagskaart',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'type' => 'Wenskaart',
                'quantity' => 50,
                'price' => 200
            ],
            [
                'name' => 'Kat speelgoed',
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'type' => 'Cadeau',
                'quantity' => 5,
                'price' => 3000
            ]
        ]);
    }
}
