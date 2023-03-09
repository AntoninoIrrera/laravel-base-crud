@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <p class="card-text">Benvenuto/a {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->role->name == 'admin')
    <div class="row">
        <div class="col-12 text-center my-3">
            <p class="m-0 fs-1 text-danger">Email totali: {{count($totalLeads)}}</p>
            @if ($trashed)
            <a class="btn btn-danger me-3" href="{{ route('email.trashed') }}"><b>{{ $trashed }}</b>
                email/s in
                recycled bin</a>
            @endif
        </div>
        @if(count($totalLeads) == 0)
        <div class="col-12">
            <h2 class="text-center text-warning mt-3">Non ci sono Email da visualizzare</h2> 
        </div>
        @endif
        <div class="col-12">
            @foreach ($leads as $lead)
            <div class="card text-center my-3">
                <div class="card-header">
                    Email
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$lead->name}}</h5>
                    <h5 class="card-title">{{$lead->email}}</h5>
                    <p class="card-text">{{$lead->message}}</p>
                    <form class="double-confirm" action="{{route('email.destroy',$lead->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-success">Presa Visione</button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    {{$lead->created_at}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12">
            {{$leads->links()}}
        </div>
    </div>
    @endif
</div>
@endsection