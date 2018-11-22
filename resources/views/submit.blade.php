@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit a link</h1>
		    {!! Form::model($query,['route' => 'queries.submit.post']) !!}
			
			 <div class="form-group">
			  {!! Form::label('query', 'Query') !!}
			  {!! Form::text('query', '', ['class' => 'form-control']) !!}
			</div>
			
			{!! Form::submit() !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection