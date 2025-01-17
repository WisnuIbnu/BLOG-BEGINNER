<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        
    $keyword = request()->keyword;

        if ($keyword != '') {
            $articles = Article::with('Category')
                        ->where('status',1)
                        ->where('title','like','%'.$keyword.'%')
                        ->latest()
                        ->paginate(4);
        } else {
            $articles = Article::with('Category')->where('status',1)->latest()->paginate(4); 
        }
        

        return view('front.home.index',[
            'latest'=> Article::with('Category')->latest()->first(),
            'article'=> $articles,
            'categories'=> Category::latest()->get()
        ]);
    }
}
