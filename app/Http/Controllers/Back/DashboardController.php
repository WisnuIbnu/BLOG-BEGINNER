<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
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

    public function index(){
        return view('back.dashboard.index',[
            'total_articles' => Article::count(),
            'total_categories' => Category::count(),
            'latest_article'=> Article::with('Category')->whereIn('status',[1,0])->latest()->get(),
            'popular_article'=> Article::with('Category')->whereIn('status',[1,0])->orderBy('views','desc')->latest()->get()
        ]);
    }
}
