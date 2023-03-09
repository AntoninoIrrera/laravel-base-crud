@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('admin.authors.partials.edit-create', [
            'method' => 'POST',
            'route' => 'admin.author.store',
            'button' => 'Create',
        ])
    </div>
@endsection
