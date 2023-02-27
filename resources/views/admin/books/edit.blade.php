@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.partials.edit-create', [
            'method' => 'PUT',
            'route' => 'admin.books.edit',
            'button' => 'Edit',
        ])
    </div>
@endsection
