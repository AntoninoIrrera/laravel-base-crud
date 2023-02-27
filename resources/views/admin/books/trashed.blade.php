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
                @if (count($books))
                    <form class="d-inline delete double-confirm" action="{{ route('admin.books.restore-all') }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary" title="restore all">Restore all</button>
                    </form>
                @endif
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Price</th>
                        <th class="col text-center">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <th scope="row" class="align-middle">{{ $book->ISBN }}</th>
                            <td class="align-middle">{{ $book->title }}</td>
                            <td class="align-middle">{{ $book->author }}</td>
                            <td class="align-middle">{{ $book->price }}</td>

                            <td class="text-center align-middle">
                                <form class="d-inline-block" action="{{ route('admin.books.restore', $book->id) }}"
                                    method="POST" data-element-name="{{ $book->title }}">
                                    @csrf
                                    <button type="submit" title="Restore" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-recycle"></i></button>
                                </form>

                                <form class="d-inline-block form-delete double-confirm"
                                    action="{{ route('admin.books.force-delete', $book->id) }}" method="POST"
                                    data-element-name="{{ $book->title }}">
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
            @if ($books->isEmpty())
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
