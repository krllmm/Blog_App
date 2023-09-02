<h1>Index page</h1>

<a href="{{ route('articles.create') }}">New article</a>


@foreach ($articles as $item)

    <h2> {{ $item->title }} </h2>

    <h4> {{ $item->content }} </h4>

    <img src="{{asset('storage/'.$item->image) }}" width="100px">

    <a href="{{ route('articles.show', $item->id) }}">Read full</a>

    <a href="{{ route('articles.edit', $item->id) }}">Edit</a>

    <form action="{{ route('articles.destroy', $item->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>

@endforeach
