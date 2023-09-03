<h1>Edit page</h1>

<form action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('patch')
    <div>
        <label for="Title">Вопрос</label>
        <input type="text" name="title" placeholder="Title" value="{{ $article->title }}">
    </div>
    <div>
        <label for="Content">Ответ</label>
        <input type="text" name="content" placeholder="Content" value="{{ $article->content }}">
    </div>
    <div>
        <label for="image">Превью</label>
        <input type="file" name="image" placeholder="Image">
    </div>


    <div>
        <label for="category">categoty</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option
                        {{ $category->id === $article->category->id ? ' selected' : '' }}
                        value="{{ $category->id }}"> {{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="tags">Tags</label>
        <select multiple name="tags[]">
            @foreach($tags as $tag)
                <option
                @foreach ($article->tags as $articleTag)
                    {{ $tag->id === $articleTag->id ? ' selected' : '' }}
                @endforeach
                        value="{{ $tag->id }}"> {{ $tag->title }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Изменить</button>
</form>
