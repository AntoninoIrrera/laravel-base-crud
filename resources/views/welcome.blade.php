@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <img src="https://static01.nyt.com/images/2015/10/24/opinion/24manguel/24manguel-superJumbo.jpg?quality=75&auto=webp" alt="" class="library">
        <h1 class="display-5 fw-bold">
            Welcome to our Library
        </h1>

        <p class="col-md-8 fs-4">Browse books using the navbar or authenticate in the top right!</p>
        {{-- <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg" type="button">Documentation</a> --}}
    </div>
</div>

{{-- <div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div> --}}
@endsection