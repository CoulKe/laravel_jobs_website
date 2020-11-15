@extends('layouts.layout')
@section('title', 'jobs')

@section('content')
<div class="container">
    @if (count($jobs) <= 0)
    <h1 class="non-existent">Check later, there are no jobs at the moment</h1>
@endif
<div class="div row justify-content-between">
    @foreach ($jobs as $job)
    
        <div class="job_card card m-4 pl-4 pt-4 col-md-5">
            <p class="company_name">
                <strong><a href={{ "profile/".$job->username }}>
                Company:</a></strong>{{ $job->company }}</p>
            <p class="job_description"><b>Description:</b>{{ $job->description }}</p>
        </div>
    @endforeach
</div>
    {{ $jobs->links() }}
</div>
@endsection