@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @foreach($books as $book)
        <div class="col-3 my-3">

            <div class="card" style="width: 18rem;">
                <img src="{{$book->cover_image}}" class="card-img-top" alt="{{$book->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    <a href="{{route('guest.show', $book->id)}}" class="btn btn-primary">Show</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            {{$books->links()}}
        </div>
    </div>
</div>


@endsection