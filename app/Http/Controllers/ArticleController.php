<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => ''
        ]);

        $data = $request->all();

        if($request->file('image') != null){
            $path = $request->file('image')->storeAs('', $request->image->getClientOriginalName());
            $data['image'] = $path;
        }

        Article::create($data);

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $category = $article->category;
        $article_category = $category->category;
        return view('article.show', compact('article', 'article_category'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

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

    public function destroy(Article $article)
    {
        if(Storage::exists($article->image)){
            Storage::delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
