<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spellendev;
use App\categorieen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['game']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', $this->data);
    }

    public function game(Request $Request)
    {
        $this->data['game'] = Spellendev::with('Category')->findOrFail($Request->id);
        return view('game', $this->data);
    }
}
