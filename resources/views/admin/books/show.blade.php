@extends('layouts.admin')

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
                        <form action="" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-md btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
