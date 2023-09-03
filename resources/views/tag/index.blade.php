<h1>Tags</h1>

@foreach ($tags as $tag)

<div> {{ $tag->title }} </div>
<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete">
</form>

@endforeach

<h2>Create tag</h2>

<form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Tag</label>
        <input type="text" name="title" placeholder="Title">
    </div>
    <button type="submit">Submit</button>
</form>
