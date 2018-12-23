@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('User') }}</div>
                    <div class="card-body">
                        {{ __('Name') }} :{{ $user->name }}<br/>
                        {{ __('Email') }} : {{ $user->email }}<br/>
                        {{ __('Locale') }} :{{ $user->locale }}<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection