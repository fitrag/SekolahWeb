<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', true)->get();
        return view('index', compact('banners'));
    }
}
