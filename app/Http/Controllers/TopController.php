<?php

namespace App\Http\Controllers;

use App\Live;
use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $live = Live::inRandomOrder()->first();
        return view('top', compact('live'));
    }
}
