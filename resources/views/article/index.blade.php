<link href="{{ asset('css/show.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/show_articles.css')}}">
@extends('layouts.main')

@section('title')
    Articles
@endsection

@section('content')
    <div class="container d-flex gap-3 mx-auto">
        <h2 class="m-0">Articles</h2>
        <a class="btn btn-primary" href="{{ route('articles.create') }}">Create article</a>
    </div>
    <div class="container">

        <ul class="row feature-list feature-list-sm list-unstyled">
            @foreach ($articles as $item)

                <li class="col-12 col-md-6 col-lg-4 mt-2">
                    <div class="card article_card">

                        <img class="card-img-top" src="{{ url('storage/' . $item->image) }}" alt="Card image cap">

                        <div class="card-body">
                            <h4 class="card-title title">
                                <a type="button" href="{{ route('articles.show', $item->id) }}">
                                    {{ $item->title }}
                                </a>
                            </h4>
                            <p class="card-text lead">{{ $item->content }}</p>
                        </div>
                        <div class="card-footer card-footer-borderless d-flex justify-content-between">
                            <div class="d-flex align-self-center m-0">
                                <h5 class="m-0">{{ $item->category->category }}</h5>
                            </div>

                            <div class="d-flex flex-row gap-2">
                                <form action="{{ route('articles.destroy', $item->id) }}" method="post" class="m-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" value="Delete"
                                        class="btn btn-block btn-danger">Delete</button>
                                </form>
                                <form class="m-0">
                                    <a href="{{ route('articles.edit', $item->id) }}" class="btn btn-block btn-secondary">Edit</a>
                                </form>
                            </div>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div>
            {{ $articles->links() }}
        </div>

    </div>
@endsection
