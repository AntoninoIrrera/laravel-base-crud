@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-5 shadow-lg">
            <div class="card-header text-center">
                <h3 class="card-title">{{ $book->title }}</h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="card-image py-4">
                    <img src="{{ $book->cover_image }}" class="card-img-top img-fluid" alt="{{ $book->title }}">
                </div>
                <p class="card-text text-center font-weight-bold">{{ $book->description }}</p>
                <ul class="list-unstyled text-center mb-4">
                    <li class="text-muted">ISBN: {{ $book->ISBN }}</li>
                    <li class="text-muted">Author: {{ $book->author }}</li>
                    <li class="text-muted">Editor: {{ $book->editor }}</li>
                    <li class="text-muted">Genre: {{ $book->genre }}</li>
                    <li class="text-muted">Publication date: {{ $book->publication_date }}</li>
                    <li class="text-muted">Price: {{ $book->price }}</li>
                </ul>
                <div class="actions d-flex justify-content-between w-100">
                    <div class="main-actions">
                        <a href="{{ route('admin.books.index', $book->id) }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="secondary-actions">
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline-block form-delete double-confirm"
                            action="{{ route('admin.books.force-delete', $book->id) }}" method="POST"
                            data-element-name="{{ $book->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
