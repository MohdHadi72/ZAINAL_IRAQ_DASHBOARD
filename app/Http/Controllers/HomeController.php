<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Product;
use App\Models\User;
use DB;

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
        $project=Project::all()->count();
        $product=Product::all()->count();
        $roles = DB::table('roles')
            ->whereNotIn('name', ['user', 'client'])
            ->count();
      
            // return $users;
        return view('home',compact('project','product','roles'));
    }
}
