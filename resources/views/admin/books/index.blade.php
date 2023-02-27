@extends('layouts.admin')

@include('partials.popup')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 mt-3 text-end">
            <a href="{{ route('admin.books.create') }}" class="btn btn-secondary">Create</a>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">price</th>
                <th scope="col">operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <th scope="row">{{$book['ISBN']}}</th>
                <td>{{$book['title']}}</td>
                <td>{{$book['author']}}</td>
                <td>{{$book['price']}}</td>
                <td>
                    <a href="#" class="btn btn-primary">Show</a>
                    <a href="#" class="btn btn-warning">Edit</a>
                    <form class="d-inline-block form-delete"
                    action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                    data-element-name="{{ $book->title }}">
                    @csrf
                    @method('DELETE')
                    <button title="Delete" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection