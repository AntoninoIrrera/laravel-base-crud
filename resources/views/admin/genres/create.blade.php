@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.genres.partials.edit-create', [
            'method' => 'POST',
            'route' => 'admin.genres.store',
            'button' => 'Create',
        ])
    </div>
@endsection
