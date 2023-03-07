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
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary"><i
                                    class="fa-solid fa-plus"></i></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{ $role['id'] }}</th>
                            <td>{{ $role['name'] }}</td>
                            <td>{{ $role['color'] }}</td>
                            <td class="text-end">
                                {{-- View --}}
                                <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-eye"></i></a>

                                {{-- Edit --}}
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-edit"></i></a>

                                {{-- Delete --}}
                                <form class="d-inline-block form-delete"
                                    action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                    data-element-name="{{ $role->name }}">
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
                    {{ $roles->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/delete.js')
@endsection
