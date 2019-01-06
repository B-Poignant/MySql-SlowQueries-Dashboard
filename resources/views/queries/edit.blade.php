@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
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

                        {!! Form::model($query,['route' => ['queries.update', $query->id]]) !!}
                            @method('PUT')
                        <div class="form-group">
                            {!! Form::label('query', 'Query') !!}
                            {!! Form::textarea('query', $query->query, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('time', 'Time') !!}
                            {!! Form::text('time', $query->time,['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('query_time', 'Query time') !!}
                            {!! Form::text('query_time', $query->query_time, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('lock_time', 'Lock time') !!}
                            {!! Form::text('lock_time', $query->lock_time, ['class' => 'form-control']) !!}
                        </div>

                            <div class="form-group">
                                {!! Form::label('rows_sent', 'Rows sent') !!}
                                {!! Form::text('rows_sent',$query->rows_sent, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('rows_examined', 'Rows examined') !!}
                                {!! Form::text('rows_examined',$query->rows_examined, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('host', 'Host') !!}
                                {!! Form::text('host', $query->host, ['class' => 'form-control']) !!}
                            </div>

                        {!! Form::submit() !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection