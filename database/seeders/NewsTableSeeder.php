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
        DB::table('news')->insert(NewsTableSeeder::GenerateRandomNews(50));
    }

    function GenerateRandomNews($amount)
    {
        $newsList = array();
        for($i = 0 ; $i < $amount ; $i++)
        {
            $news = [
                'created_at' =>  Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => Str::random(10),
                'author' => Str::random(10),
                'category' => Str::random(10),
                'content' => Str::random(100)];
            array_push($newsList, $news);
        }
        return $newsList;
    }
}
