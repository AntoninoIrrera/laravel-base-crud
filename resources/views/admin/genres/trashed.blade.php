@extends('layouts.app')

@include('partials.popup')

@section('content')
    <div class="container">

        {{-- @if (session('message'))
        <div class="alert alert-{{ session('alert-type') }}">
            {{ session('message') }}
        </div>
    @endif --}}

        <div class="row justify-content-around">
            <div class="col-12 d-flex justify-content-end my-3">
                @if (count($genres))
                    <form class="d-inline delete double-confirm" action="{{ route('admin.genres.restore-all') }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" title="restore all">Restore all</button>
                    </form>
                @endif
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <th scope="row" class="align-middle">{{ $genre->id }}</th>
                            <td class="align-middle">{{ $genre->name }}</td>
                            <td class="align-middle">{{ $genre->color }}</td>

                            <td class="text-center align-middle">
                                <form class="d-inline-block" action="{{ route('admin.genres.restore', $genre->id) }}"
                                    method="POST" data-element-name="{{ $genre->title }}">
                                    @csrf
                                    <button type="submit" title="Restore" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-recycle"></i></button>
                                </form>

                                <form class="d-inline-block form-delete double-confirm"
                                    action="{{ route('admin.genres.force-delete', $genre->id) }}" method="POST"
                                    data-element-name="{{ $genre->title }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" class="btn btn-sm btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($genres->isEmpty())
                <div class="empty-message mt-3 text-muted">
                    <h5>No items in the bin</h5>
                </div>
            @endif
        </div>

    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
