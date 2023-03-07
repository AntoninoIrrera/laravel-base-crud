@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.roles.partials.edit-create', [
            'method' => 'PUT',
            'route' => 'admin.roles.update',
            'button' => 'Edit',
        ])
    </div>
@endsection
