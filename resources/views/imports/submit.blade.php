@extends('layouts/auth')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Import a log file</div>
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
				{!! Form::open(['route' => 'imports.submit','files' => true]) !!}
				
				 <div class="form-group">
				  {!! Form::label('log', 'Log') !!}
				  {!! Form::file('log') !!}
				</div>
				
				{!! Form::submit() !!}
				{!! Form::close() !!}
			</div>
			</div>
		</div>
	</div>
</div>
@endsection