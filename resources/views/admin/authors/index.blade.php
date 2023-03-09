@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <div class="container">

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col"># of books</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Bio</th>
                        <th scope="col" class="text-end">
                            <a href="{{ route('admin.authors.create') }}" class="btn btn-secondary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <th scope="row">{{ $author['id'] }}</th>
                            <td>{{ $author['first_name'] }}</td>
                            <td>{{ $author['last_name'] }}</td>
                            <td>{{ count($author->books) }}</td>
                            <td>{{ $author['birthdate'] }}</td>
                            <td>{{ Str::limit($author['biography'], 50) }}</td>
                            <td class="text-end">
                                {{-- View --}}
                                <a href="{{ route('admin.authors.show', $author->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-eye"></i></a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-edit"></i></a>

                                {{-- Delete --}}
                                <form class="d-inline-block form-delete"
                                    action="{{ route('admin.authors.destroy', $author->id) }}" method="POST"
                                    data-element-name="{{ $author->name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
