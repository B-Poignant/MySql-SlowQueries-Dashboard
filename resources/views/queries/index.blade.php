@extends('layouts/auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Queries index</div>

                <div class="card-body">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

                    @foreach ($queries as $query)
	   {{ $query->query }}<br />
	@endforeach
	
	{{ $queries->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
