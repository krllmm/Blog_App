<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ArticleTag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::Paginate(5);
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $data = $request->all();
        $tags = $data['tags'];
        unset($data['tags']);

        if($request->file('image') != null){
            $path = $request->file('image')->storeAs('', $request->image->getClientOriginalName());
            $data['image'] = $path;
        }

        $article = Article::create($data);
        $article->tags()->attach($tags);
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $category = $article->category;
        $article_category = $category->category;
        $tags = $article->tags;
        return view('article.show', compact('article', 'article_category', 'tags'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $data = $request->all();
        $tags = $data['tags'];
        unset($data['tags']);

        $data = $request->all();
        if($request->image == null){
            $article->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'category_id' => $data['category_id'],
            ]);
        }else{
            if($article->image != "default_article_preview_image.png"){
                if(Storage::exists($article->image)){
                    Storage::delete($article->image);
                }
            }
            $path = $request->file('image')->storeAs('', $request->image->getClientOriginalName());
            $data['image'] = $path;
            $article->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'image' => $data['image'],
                'category_id' => $data['category_id'],
            ]);
        }

        $article->tags()->sync($tags);
        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        if($article->image != "default_article_preview_image.png"){
            if(Storage::exists($article->image)){
                Storage::delete($article->image);
            }
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
