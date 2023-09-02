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
    <button type="submit" class="btn btn-primary">Изменить</button>
</form>
