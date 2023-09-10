@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/tags_categories.css') }}">

@section('title')
    Manage categories
@endsection

@section('content')
    <div class="container-fluid col-9 p-0 content">
        <h1 class="row justify-content-center">Categories</h1>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->category }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="my-auto">
                                @csrf
                                @method('delete')
                                <button href="{{ route('categories.destroy', $category->id) }}"
                                    class="btn btn-block btn-warning">Delete</button>
                            </form>
                        </td>
                        <td><button href="{{ route('categories.edit', $category->id) }}"
                                class="btn btn-block btn-secondary">Edit</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="row my-4 mx-0">Create category</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="col-9">
                <div class="row">
                    <div class="col form-group">
                        <input type="text" name="category" class="form-control item" placeholder="Category name">
                    </div>
                    <div class="col form-group">
                        <button type="submit" class="btn btn-block btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
