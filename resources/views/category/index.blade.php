<h1>Tags</h1>

@foreach ($categories as $category)

<div> {{ $category->category }} </div>
<form action="{{ route('categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete">
</form>

@endforeach

<h2>Create category</h2>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label for="category">Category</label>
        <input type="text" name="category" placeholder="Category">
    </div>
    <button type="submit">Submit</button>
</form>
