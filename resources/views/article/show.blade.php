@extends('layouts.main')
@section('title')
    Create article
@endsection

@section('content')

    <h1 class="row justify-content-center">{{ $article->title }}</h1>


<h4> {{ $article->content }} </h4>

<p>{{ $article_category }}</p>

<h3>Tags</h3>
<div>
    @foreach ($tags as $tag)
        <p>{{ $tag->title }}</p>
    @endforeach
</div>

<img src="{{asset('storage/'.$article->image) }}" width="300px">

<a href="{{ route('articles.index') }}">Home</a>


@endsection
