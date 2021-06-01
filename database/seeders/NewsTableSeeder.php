<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
        [
            [
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => 'Kiki redt de dag opnieuw',
                'author' => Str::random(10),
                'category' => 'Heldendaad',
                'content' => Str::random(200)
            ],
            [
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => 'Wegens slecht weer geen vlieglessen',
                'author' => Str::random(10),
                'category' => 'Planning',
                'content' => Str::random(200)
            ],
            [
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => 'Nu ook online-webshop!',
                'author' => Str::random(10),
                'category' => 'Website',
                'content' => Str::random(200)
            ]
        ]);
    }
}
