<link href="{{ asset('css/article.css') }}" rel="stylesheet">
@extends('layouts.main')
@section('title')
    View Article
@endsection

@section('content')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $article->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{ $article->created_at }}</div>
                            <!-- Post categories-->

                            @foreach ($tags as $tag)
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->title }}</a>
                            @endforeach

                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded image"
                                src="{{ asset('storage/' . $article->image) }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5 content">
                            {{ $article->content }}
                        </section>
                    </article>
                    <!-- Comments section-->

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..."
                                    aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                            use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Blog App 2023</p>
            </div>
        </footer>
@endsection
