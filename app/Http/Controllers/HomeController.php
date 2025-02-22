<?php

namespace App\Http\Controllers;

use App\Models\CanHo;
use App\Models\ChungCu;
use App\Models\News;
use Illuminate\Http\Request;

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
    public function index()
    {
        $countNews = News::count();
        $countBuildings = ChungCu::count();
        $countApartments = CanHo::count();
        
        return view('admin.home' , compact('countNews','countBuildings','countApartments'));
    }
}
