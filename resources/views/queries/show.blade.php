@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Query') }}</div>
                    <div class="card-body">
                        {{ __('Created at') }} :{{ $query->created_at }}<br/>
                        {{ __('Updated at') }} : {{ $query->updated_at }}<br/>
                        {{ __('Time') }} : {{ $query->time }}<br/>
                        {{ __('User') }} : {{ $query->user }}<br/>
                        {{ __('Host') }} : {{ $query->host }}<br/>
                        {{ __('Proccess id') }} : {{ $query->proccess_id }}<br/>

                        {{ __('Query time') }} : {{ $query->query_time }}<br/>
                        {{ __('Lock time') }} : {{ $query->lock_time }}<br/>
                        {{ __('Rows sent') }} : {{ $query->rows_sent }}<br/>
                        {{ __('Rows examined') }} : {{ $query->rows_sent }}<br/>
                        {{ __('Query') }} : {{ $query->query }}<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection