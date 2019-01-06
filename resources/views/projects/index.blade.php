@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{__('Projects index')}} <a class="btn btn-primary"
                                                              href="{{ route('projects.create') }}">{{__('Add a project')}}</a>
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
                                <th> {{ __('Name') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td><a class="btn btn-primary"
                                           href="{{ route('projects.show',$project->id) }}">{{__('Show')}}</a>
                                        <a class="btn btn-primary"
                                           href="{{ route('projects.edit',$project->id) }}">{{__('Edit')}}</a></td>
                                </tr>
                            @endforeach
                            {{ $projects->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
