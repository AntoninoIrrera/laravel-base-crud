@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-5">
            <div class="card-header text-center">
                <h4 class="card-title">{{ $book->title }}</h4>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="card-image">
                    <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}">
                </div>
                <p class="card-text text-center">{{ $book->description }}</p>
                <hr>
                <p class="card-text text-center">
                    <small class="text-muted">Author: {{ $book->author }}</small><br>
                    <small class="text-muted">Pubblication date: {{ $book->pubblication_date }}</small><br>
                    <small class="text-muted">Genre: {{ $book->genre }}</small><br>
                    <small class="text-muted">Editor: {{ $book->editor }}</small><br>
                    <small class="text-muted">ISBN: {{ $book->ISBN }}</small><br>
                    <small class="text-muted">Price: {{ $book->price }}</small>
                </p>
                <div class="actions d-flex justify-content-between w-100">
                    <div class="main-actions">
                        <a href="" class="btn btn-primary">Edit</a>
                        <form class="d-inline-block form-delete double-confirm"
                            action="{{ route('admin.books.force-delete', $book->id) }}" method="POST"
                            data-element-name="{{ $book->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Delete" class="btn btn-sm btn-danger">Delete</button>
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
