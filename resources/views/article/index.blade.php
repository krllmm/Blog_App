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
        <div class="row">

                @foreach ($articles as $item)
                    <div class="col-md-12 text-center">
                        <div class="box">
                            <div class="box-content">

                                <section class="p-0">
                                    <div class="container px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-7 p-0"><img class="mb-md-0 image" src="{{ asset('storage/' . $item->image) }}" alt="..." /></div>
                                            <div class="col-md-5 p-0">

                                                <h1 class="display-6 fw-bolder">{{ $item->title }}</h1>

                                                <p class="lead">{{ $item->content }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <div class="d-flex gap-1">

                                    <form action="{{ route('articles.destroy', $item->id) }}" method="post" class="m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete"
                                            class="btn btn-block btn-danger">Delete</button>
                                    </form>

                                    <form class="m-0">
                                        <a href="{{ route('articles.show', $item->id) }}"
                                            class="btn btn-block btn-primary">Read full</a>
                                        <a href="{{ route('articles.edit', $item->id) }}"
                                            class="btn btn-block btn-secondary">Edit</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
@endsection
