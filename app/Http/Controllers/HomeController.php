<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talkroom;
// use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $talkrooms = Talkroom::all()->where('del_flg',0);

        return view('content.contents', compact('talkrooms')); 
    }

}
