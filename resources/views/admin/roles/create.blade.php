@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.roles.partials.edit-create', [
            'method' => 'POST',
            'route' => 'admin.roles.store',
            'button' => 'Create',
        ])
    </div>
@endsection
