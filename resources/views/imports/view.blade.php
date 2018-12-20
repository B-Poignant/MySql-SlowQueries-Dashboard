@extends('layouts/auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Import') }}</div>
                    <div class="card-body">
                        {{ __('Created at') }} :{{ $import->created_at }}<br/>
                        {{ __('Updated at') }} : {{ $import->updated_at }}<br/>
                        {{ __('Status') }} : @component('imports/status',['status'=>$import->status])@endcomponent
                        @if ($import->importDetail)
                            <p>{{ __('Statistic') }}</p>
                            <ul>
                                <li>{{ __('Nb queries') }} : {{ $import->importDetail->nb_queries }}</li>
                                <li>{{ __('Nb files') }} : {{ $import->importDetail->nb_files }}</li>
                                <li>{{ __('Query time') }} : {{ $import->importDetail->query_time }}</li>
                                <li>{{ __('Lock time') }} : {{ $import->importDetail->lock_time }}</li>
                                <li>{{ __('Rows sent') }} : {{ $import->importDetail->rows_sent }}</li>
                                <li>{{ __('Rows examined') }} : {{ $import->importDetail->rows_examined }}</li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection