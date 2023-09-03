<h1>Create page</h1>

<form action="{{ route('articles.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title">
    </div>
    <div>
        <label for="content">Content</label>
        <input type="text" name="content" placeholder="Content">
    </div>
    <div>
        <label for="image">image</label>
        <input type="file" name="image" placeholder="Image">
    </div>
    <div>
        <label for="category">categoty</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="tags">Tags</label>
        <select multiple name="tags[]">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"> {{ $tag->title }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Submit</button>
</form>
