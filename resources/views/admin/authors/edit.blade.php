@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.authors.partials.edit-create', [
            'method' => 'PUT',
            'route' => 'admin.authors.update',
            'button' => 'Edit',
        ])
    </div>
@endsection
