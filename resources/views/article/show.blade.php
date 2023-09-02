<h1> {{ $article->title }} </h1>

<h4> {{ $article->content }} </h4>

<img src="{{asset('storage/'.$article->image) }}" width="300px">

<a href="{{ route('articles.index') }}">Home</a>
