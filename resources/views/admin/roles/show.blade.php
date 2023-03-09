@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-4">Go Back</a>
        <div class="card mb-3 mt-5 shadow-lg">
            <div class="card text-center">
                <div class="text my-4">
                    <span>Id: {{ $role->id }}</span>
                    <h3 class="card-title fw-bold my-3">{{ $role->name }}</h3>
                    <h5 style="background-color: {{ $role->color }}" class="py-3">
                        {{ $role->color }}
                    </h5>
                </div>

                <div class="secondary-actions mb-2">
                    {{-- Edit --}}
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning"><i
                            class="fa-solid fa-edit"></i></a>
                    {{-- Delete --}}
                    <form class="d-inline-block form-delete" action="{{ route('admin.roles.destroy', $role->id) }}"
                        method="POST" data-element-name="{{ $role->name }}">
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
