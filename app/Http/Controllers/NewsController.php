<?php

namespace App\Http\Controllers;

use App\Repository\NewsRepository;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function index()
    {
        return view('news', ['news' => NewsRepository::GetOverviewNews()]);
    }
}
