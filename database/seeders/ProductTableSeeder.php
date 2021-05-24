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
        DB::table('products')->insert([
            'name' => 'Strawberry cake',
            'created_at' =>  Carbon::now(),
            'updated_at' => Carbon::now(),
            'type' => 'Cake',
            'quantity' => 20]);
    }
}
