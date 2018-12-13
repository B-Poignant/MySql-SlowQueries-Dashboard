@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Queries index <a class="btn btn-primary"
                                                              href="{{ route('queries.submit') }}">{{__('Add a query')}}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th> {{ __('Query') }}</th>
                                <th> {{ __('Time') }}</th>
                                <th> {{ __('Lock Time') }}</th>
                                <th> {{ __('Query Time') }}</th>
                                <th> {{ __('Import Id') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($queries as $query)
                                <tr>
                                    <td>{{ str_limit($query->query,50,'(...)') }}</td>
                                    <td>{{ $query->time }}</td>
                                    <td>{{ $query->lock_time }}</td>
                                    <td>{{ $query->query_time }}</td>
                                    <td>@if ($query->import_id)<a href="{{ route('queries.index',$query->import_id) }}">Import {{$query->import_id}}</a>@endif</td>
                                </tr>
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
