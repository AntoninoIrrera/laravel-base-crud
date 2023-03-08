@extends('layouts.admin')

@include('partials.popup')

@section('content')


<div class="row justify-content-around">
    <div class="col-12 d-flex justify-content-end my-3">
        @if (count($leads))
        <form class="d-inline delete double-confirm" action="{{ route('email.restore-all') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" title="restore all">Restore all</button>
        </form>
        @endif
    </div>

    @foreach ($leads as $lead)
    <div class="card text-center my-3">
        <div class="card-header">
            Email
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$lead->name}}</h5>
            <h5 class="card-title">{{$lead->email}}</h5>
            <p class="card-text">{{$lead->message}}</p>
            <form class="d-inline-block mt-3" action="{{ route('email.restore', $lead->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-success"><i class="fa-solid fa-recycle"></i></button>
            </form>
            <form class="d-inline-block mt-3 form-delete double-confirm" action="{{ route('email.force-delete', $lead->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
    @endforeach

    @if ($leads->isEmpty())
    <div class="empty-message mt-3 text-muted">
        <h5 class="text-center">No items in the bin</h5>
    </div>
    @endif
</div>

</div>
@endsection

@section('script')
@vite('resources/js/delete.js')
@endsection