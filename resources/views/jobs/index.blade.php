@extends('layouts.layout')
@section('title', 'jobs')

@section('content')
@if (count($collection) <= 0)
    <h1 class="text-center pt-5">Check later, there are no jobs at the moment</h1>
@endif
    @foreach ($collection as $job)
    <div class="job_card">
        <p class="company_name">
            <strong><a href={{ "profile/".$job->username }}>
            Company:</a></strong>{{ $job->company }}</p>
        <p class="job_description"><b>Description:</b>{{ $job->description }}</p>
    </div>
    @endforeach
@endsection