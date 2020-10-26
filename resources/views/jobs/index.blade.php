@extends('layouts.app')
@section('title', 'jobs')

@section('content')
    @foreach ($collection as $job)
    <div class="job_card">
        <p class="company_name">
            <strong><a href={{ "profile?username=".$job->name }}>
            Company:</a></strong>{{ $job->company }}</p>
        <p class="job_description"><b>Description:</b>{{ $job->description }}</p>
    </div>
    @endforeach
@endsection