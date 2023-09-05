
<h1> {{ $article->title }} </h1>

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



