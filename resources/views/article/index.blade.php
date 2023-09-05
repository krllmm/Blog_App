<link href="{{ asset('css/show.css') }}" rel="stylesheet">
@extends('layouts.main')
@section('content')
    <div class="d-flex gap-3">

        <h2 class="m-0">Articles</h2>

        <a class="btn btn-primary" href="{{ route('articles.create') }}">Create article</a>

    </div>

    <div class="container">
        <div class="row">
            <div class="row">

                @foreach ($articles as $item)
                    <div class="col-md-12 text-center">
                        <div class="box">
                            <div class="box-content">
                                <h1 class="tag-title">{{ $item->title }}</h1>
                                <hr />
                                <img src="{{ asset('storage/' . $item->image) }}" width="150px">
                                <p>{{ $item->content }}</p>
                                <br />
                                <div class="d-flex gap-1">

                                    <form action="{{ route('articles.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete"
                                            class="btn btn-block btn-danger">Delete</button>
                                    </form>

                                    <form>
                                        <button href="{{ route('articles.show', $item->id) }}"
                                            class="btn btn-block btn-primary">Read full</button>
                                        <button href="{{ route('articles.edit', $item->id) }}"
                                            class="btn btn-block btn-secondary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
