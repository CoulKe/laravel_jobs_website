@extends('layouts.layout')
@section('title', $job->description)

@if (count($job) <= 0)
<h1>Sorry, that job may have been deleted</h1>
@else
@section('content')
<div class="job_card">
        <p class="company_name">
            <strong><a href={{ "profile?username=".$job->name }}>
            Company:</a></strong>{{ $job->company }}</p>
        <p class="job_description"><b>Description:</b>{{ $job->description }}</p>
    </div>
    <a href="/jobs">See more</a>
@endsection
@endif