@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Project') }}</div>
                    <div class="card-body">
                        {{ __('Name') }} : {{ $project->name }}<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection