@extends('layouts/auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Queries index <a class="btn btn-primary" href="{{ route('queries.submit') }}">aa</a></div>

                <div class="card-body">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <table class="table">
        <thead>
        <tr>
            <th> {{ __('Status') }}</th>
            <th> {{ __('Path') }}</th>
            <th> {{ __('Size') }}</th>
        </tr>
        </thead>
        <tbody>
                    @foreach ($queries as $query)
	  <tr><td>{{ $query->query }}</td></tr>
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
