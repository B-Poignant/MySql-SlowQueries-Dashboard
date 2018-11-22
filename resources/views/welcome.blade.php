@extends('layout')
@section('content')
    @foreach ($queries as $query)
	   {{ $query->query }}<br />
	@endforeach
@endsection