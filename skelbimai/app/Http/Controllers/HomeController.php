<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
    }

    public function landingpage()
    {
        $data['popular'] = Ad::orderByDesc('views')->limit(4)->get();
        $data['recent'] = Ad::orderByDesc('id')->limit(4)->get();
        return view('landingpage', $data);
    }
}
