@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.genres.partials.edit-create', [
            'method' => 'PUT',
            'route' => 'admin.genres.update',
            'button' => 'Edit',
        ])
    </div>
@endsection
