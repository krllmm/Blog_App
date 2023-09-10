@extends('layouts.main')
@section('title')
    Create article
@endsection

<style>
    .content{
        min-height: calc(100vh - 217px);
    }
</style>

@section('content')
    <h1 class="row justify-content-center m-0">Create article</h1>
    <div class="row m-0 content">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">

                    <div class="container">
                        <form action="{{ route('articles.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter article`s title" required="required"
                                                data-error="Title is required.">
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
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"> {{ $tag->title }}</option>
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
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"> {{ $category->category }}
                                                        </option>
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
                                                data-error="Article should have content"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-success btn-send mt-2 btn-block">Create</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
