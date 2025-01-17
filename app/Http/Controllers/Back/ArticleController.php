<?php

namespace App\Http\Controllers\back;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 1) {
            $articles = Article::latest()->get();
        } else {
            $articles = Article::where('user_id', auth()->user()->id)->latest()->get(); 
        }
        
        return view("back.article.index", [
            'articles' => $articles,
            'user' => auth()->user()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create',[
            'categories'=>Category::get(),
            'user' =>User::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('image'); //foto
        $fileName = uniqid().'.'. $file->getClientOriginalExtension();
        $file->storeAs('public/back/', $fileName);
        
        
        $data['image'] = $fileName;
        $data['slug'] = Str::slug($data['title']);
        
        Article::create($data);

        return redirect(url('article'))->with('success', 'Berhasil Membuat Article Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show',[
            'article'=> Article::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update',[
            'article'   => Article::find($id),
            'categories'=>Category::get(),
            'user' =>User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image'); //foto
            $fileName = uniqid().'.'. $file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);
            
            Storage::delete('public/back/'.$request->oldImage);

            $data['image'] = $fileName;
        } else {
            $data['image'] = $request->oldImage;
        }
        
        $data['user_id'] = auth()->id();

        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect(url('article'))->with('success', 'Berhasil Mengubah Article ');
    }

    public function destroy(string $id)
    {
        Article::find($id)->delete();
        return back()->with('success','Berhasil Hapus Artikel');        
    }
}
