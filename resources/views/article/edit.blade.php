@extends('layouts.main')
@section('title')
    Create article
@endsection

@section('content')
    <h1 class="row justify-content-center">Edit article</h1>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                    <div class="container">
                        <form action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('patch')


                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter article`s title" required="required"
                                                data-error="Title is required." value="{{ $article->title }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control"
                                                placeholder="Choose an image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tags">Tags</label>
                                            <select multiple name="tags[]" class="form-control">
                                                @foreach($tags as $tag)
                                                    <option
                                                    @foreach ($article->tags as $articleTag)
                                                        {{ $tag->id === $articleTag->id ? ' selected' : '' }}
                                                    @endforeach
                                                            value="{{ $tag->id }}"> {{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div>
                                                <label for="category">Categoty</label>
                                                <select name="category_id" class="form-control" required="required"
                                                    data-error="Please specify the category.">
                                                    @foreach($categories as $category)
                                                    <option
                                                            {{ $category->id === $article->category->id ? ' selected' : '' }}
                                                            value="{{ $category->id }}"> {{ $category->category }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="content" class="form-control" placeholder="Write your article here." rows="8" required="required"
                                                data-error="Article should have content" >{{ $article->content }}</textarea>
                                        </div>

                                    </div>


                                    <div class="col-md-12">

                                        <button type="submit"
                                            class="btn btn-success btn-send mt-2 btn-block">Update</button>

                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>

    @endsection
