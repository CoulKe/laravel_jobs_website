@extends('layouts.layout')
@section('title', $job['description'] ?? '')

@if (count($job) <= 0)
<h1 class="non-existent">Sorry, that job may have been deleted</h1>
@else
@section('content')
<div class="container">
    <div class="job_card card mx-auto mt-4 pl-4 pt-4 col-md-5">
        <p class="company_name">
            <strong><a href={{ "profile?username=".$job['name'] }}>
            Company:</a></strong>{{ $job['company'] }}</p>
        <p class="job_description"><b>Description:</b>{{ $job['description'] }}</p>
    </div>
    <a href="/jobs" class="text-center d-block pt-2">See more</a>
</div>
@endsection
@endif