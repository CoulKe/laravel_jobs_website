@extends('layouts.layout')
@section('title', $job->description)

@section('content')
<div class="job_card">
        <p class="company_name">
            <strong><a href={{ "profile?username=".$job->name }}>
            Company:</a></strong>{{ $job->company }}</p>
        <p class="job_description"><b>Description:</b>{{ $job->description }}</p>
    </div>
    <a href="/jobs">See more</a>
@endsection