@extends('layouts.app')

@section('content')
    <section id="index-book">

        <div class="container">
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-3 my-3">

                        <div class="book-card position-relative" style="width: 18rem;">
                            <img src="{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->description }}</p>


                                <a href="{{ route('guest.show', $book->id) }}"
                                    class="btn btn-primary position-absolute top-0 end-0"><i
                                        class="fa-solid fa-eye"></i></a></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $books->links() }}
                </div>
            </div>
    </section>
@endsection
