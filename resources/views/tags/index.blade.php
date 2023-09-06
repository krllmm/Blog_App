@extends('layouts.main')

@section('title')
    Manage tags
@endsection

@section('content')
    <div class="container-fluid col-9 p-0">
        <h1 class="row justify-content-center">Tags</h1>


        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{ $tag->id }}</th>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button href="{{ route('tags.destroy', $tag->id) }}"
                                    class="btn btn-block btn-warning">Delete</button>
                            </form>
                        </td>
                        <td><button href="{{ route('tags.edit', $tag->id) }}"
                                class="btn btn-block btn-secondary">Edit</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="row my-4 mx-0">Create tag</h2>

        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="col-9">
                <div class="row">
                    <div class="col form-group">
                        <input type="text" name="title" class="form-control item" placeholder="Tag name">
                    </div>
                    <div class="col form-group">
                        <button type="submit" class="btn btn-block btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
