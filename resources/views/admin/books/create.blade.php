@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.partials.edit-create', [
            'method' => 'POST',
            'route' => 'admin.books.store',
            'button' => 'Create',
        ])
    </div>
@endsection
