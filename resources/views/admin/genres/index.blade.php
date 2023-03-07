@extends('layouts.admin')

@include('partials.popup')

@section('content')
    <div class="container">
        <div class="container">

            <div class="row">
                <div class="col-12 mt-3 text-end">
                    {{-- @if ($trashed)
                        <a class="btn btn-danger me-3" href="{{ route('admin.roles.trashed') }}"><b>{{ $trashed }}</b>
                            item/s in
                            recycled bin</a>
                    @endif --}}
                </div>
            </div>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">
                            <a href="{{ route('admin.genres.create') }}" class="btn btn-secondary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <th scope="row">{{ $genre['id'] }}</th>
                            <td>{{ $genre['name'] }}</td>
                            <td>{{ $genre['color'] }}</td>
                            <td class="text-end">
                                {{-- View --}}
                                <a href="{{ route('admin.genres.show', $genre->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-eye"></i></a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-edit"></i></a>

                                {{-- Delete --}}
                                <form class="d-inline-block form-delete"
                                    action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST"
                                    data-element-name="{{ $genre->name }}">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                {{-- <div class="col-12">
                    {{ $genres->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
