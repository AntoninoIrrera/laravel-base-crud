@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <div class="card mb-3 mt-5 shadow-lg">
            <div class="card text-center">
                <div class="text my-4">
                    <span>Id: {{ $author->id }}</span>
                    <h3 class="card-title fw-bold my-3">{{ $author->first_name }} {{ $author->last_name }}</h3>
                    <p>Birthdate: {{ $author->birthdate }}</p>
                    <p>BIO <br> {{ $author->biography }}</p>
                </div>

                <div class="secondary-actions mb-2">
                    {{-- Edit --}}
                    <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-warning"><i
                            class="fa-solid fa-edit"></i></a>
                    {{-- Delete --}}
                    <form class="d-inline-block form-delete" action="{{ route('admin.authors.destroy', $author->id) }}"
                        method="POST" data-element-name="{{ $author->name }}">
                        @csrf
                        @method('DELETE')
                        <button title="Delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
