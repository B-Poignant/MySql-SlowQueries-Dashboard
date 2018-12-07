@extends('layouts/auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Imports index</div>

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
                                    <th> {{ __('Status') }}</th>
                                    <th> {{ __('Path') }}</th>
                                    <th> {{ __('Size') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($imports as $import)
                                @php
echo '<pre>';var_dump( $import    );  echo '</pre>';    @endphp
                                <tr>
                                    <td>{{ $import->sync }}</td>
                                    <td>{{ $import->path }}</td>
                                    <td>{{ $import->size }}</td>
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
