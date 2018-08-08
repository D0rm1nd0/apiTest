<?php

namespace App\Http\Controllers;

use App\Coin;

class ShowDataController extends Controller
{
    public function index()
    {
        return view('home')->with(['coins' => Coin::with('quote')->get()]);
    }
}
