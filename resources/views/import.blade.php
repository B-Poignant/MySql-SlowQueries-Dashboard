@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Import a log file</h1>
		    {!! Form::open(['route' => 'queries.import.post','files' => true]) !!}
			
			 <div class="form-group">
			  {!! Form::label('log', 'Log') !!}
			  {!! Form::file('log') !!}
			</div>
			
			{!! Form::submit() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection