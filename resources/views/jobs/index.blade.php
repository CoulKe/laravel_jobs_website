@extends('layouts.layout')
@section('title', 'jobs')

@section('content')
    @if (count($jobs) > 0)
    @foreach ($jobs as $job)
        {{ $job->company }}
    @endforeach
    @else
    Sorry, check later
    @endif
@endsection