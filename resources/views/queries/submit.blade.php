@extends('layouts/auth')

@section('content')
<div class="container">
	<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Submit a query</div>
			<div class="card-body">
			@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

		{!! Form::model($query,['route' => 'queries.submit']) !!}
		
		 <div class="form-group">
		  {!! Form::label('query', 'Query') !!}
		  {!! Form::text('query', '', ['class' => 'form-control']) !!}
		</div>
		
		{!! Form::submit() !!}
		{!! Form::close() !!}
		 </div>
	</div>
</div>
@endsection