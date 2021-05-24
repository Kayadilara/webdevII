<?php

namespace App\Repository;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsRepository
{
    static function GetOverviewNews()
    {
        return DB::table('news')
            ->orderBy('updated_at','desc')
            ->take(20)
            ->get();
    }
}