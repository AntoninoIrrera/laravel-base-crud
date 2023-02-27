@extends('layouts.app')

@section('content')
    {{-- <div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div> --}}
    <div class="myWelcome">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center myBg">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-1 fw-normal fw-bold">LIBRARY</h1>
                <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this
                    example based on Apple’s marketing pages.</p>
                <a class="btn text-bg-white btn-dark" href="{{ route('guest.index') }}">Discover All</a>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Discover our bestsellers</h2>
                    <p class="lead">Sign up to discover them all.</p>
                    <a class="btn text-bg-white btn-dark" href="{{ route('guest.index') }}">Buy it now</a>
                </div>
                <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    <img src="https://d2i0w0hu6hvxgc.cloudfront.net/B019PIOJY0/e121106a/cover.jpeg" alt=""
                        style="width: 100%;">
                </div>
            </div>
            <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Sign in</h2>
                    <p class="lead">To select our books.</p>
                    <a class="btn text-bg-white btn-dark" href="{{ route('login') }}">Register</a>
                </div>
                <div class="bg-body shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    <img src="https://m.media-amazon.com/images/I/81ZhkgxEkFL.jpg" alt="" style="width: 100%;">
                </div>
            </div>
        </div>

    </div>
@endsection
