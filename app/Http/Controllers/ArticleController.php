<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);

        $data = $request->all();

        if($request->file('image') != null){
            $path = $request->file('image')->storeAs('', $request->image->getClientOriginalName());
            $data['image'] = $path;
        }

        Article::create($data);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);

        $data = $request->all();

        if($request->image == null){
            $article->update([
                'title' => $data['title'],
                'content' =>$data['content']
            ]);
        }else{
            if(Storage::exists($article->image)){
                Storage::delete($article->image);
            }
            $path = $request->file('image')->storeAs('', $request->image->getClientOriginalName());
            $data['image'] = $path;
            $article->update($data);
        }

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(Storage::exists($article->image)){
            Storage::delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
