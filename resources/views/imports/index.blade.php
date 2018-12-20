@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Imports index <a class="btn btn-primary"
                                                              href="{{ route('imports.submit') }}">{{__('Add an import')}}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($imports)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('Created at') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($imports as $import)
                                    <tr>
                                        <td>{{ $import->created_at }}</td>
                                        <td>{{ $import->status }}</td>
                                        <td><a class="btn btn-primary"
                                               href="{{ route('imports.view',$import->id) }}">{{__('Voir')}}</a></td>
                                    </tr>
                                @endforeach

                                {{ $imports->links() }}
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
