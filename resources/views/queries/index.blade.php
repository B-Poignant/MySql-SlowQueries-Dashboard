@extends('layouts/auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Queries index <a class="btn btn-primary" href="{{ route('queries.submit') }}">{{__('Add a query')}}</a></div>

                <div class="card-body">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <table class="table">
        <thead>
        <tr>
            <th> {{ __('Query') }}</th>
            <th> {{ __('Time') }}</th>
            <th> {{ __('Lock Time') }}</th>
        </tr>
        </thead>
        <tbody>
                    @foreach ($queries as $query)
	  <tr><td>{{ $query->query }}</td><td>{{ $query->time }}</td><td>{{ $query->lock_time }}</td></tr>
                    @endforeach
	
	{{ $queries->links() }}
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
