@extends('layouts.app')



@section('content')

<div class="container">
    <div class="card mb-3 mt-5">
        <div class="card-header text-center">
            <h3 class="card-title">{{ $book->title }}</h3>
        </div>
        <div class="card-body d-flex flex-column justify-content-center align-items-center">
            <div class="card-image py-5">
                <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}">
            </div>
            <p class="card-text text-center">{{ $book->description }}</p>
            <p class="card-text text-center">
                <small class="text-muted">Author: {{ $book->author }}</small><br>
                <small class="text-muted">Publication date: {{ $book->publication_date }}</small><br>
                <small class="text-muted">Genre: {{ $book->genre }}</small><br>
                <small class="text-muted">Editor: {{ $book->editor }}</small><br>
                <small class="text-muted">ISBN: {{ $book->ISBN }}</small><br>
                <small class="text-muted">Price: {{ $book->price }}</small>
            </p>
            <div class="actions d-flex w-100">
                <div class="main-actions">
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                    <form class="d-inline-block form-delete double-confirm" action="{{ route('admin.books.force-delete', $book->id) }}" method="POST" data-element-name="{{ $book->title }}">
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