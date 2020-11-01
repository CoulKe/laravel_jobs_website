@extends('layouts.layout')
@section('title','Home')
@section('content')
    
<div id="header">
    <div id="header-wrapper">
        <h1 id="banner-intro">Your dream job awaits you</h1>
        <p id="slogan">just one click away</p>
        <form action="jobs" method="get">
            <input type="search" name="keyword" placeholder="Type keyword">
            <input type="submit" value="Search">
        </form>

    </div>
</div>

<div class="container">
    <section id="latest_section">
        <h1 class="title">Latest jobs</h1>

        <div class="jobs">
            @foreach ($jobs as $job)
            <div class="latest_job">
                <div class="image"></div>
                <div class="company_title">
                    Company: <a href={{ "profile/.$job->username " }}> {{ $job->company }}</a>
                </div>
                <div class="job_description">
                        Description:<br /> {{ $job->description }}
                </div>
            </div>
            @endforeach
        </div>
        <a href="jobs" class="see_more">Browse more jobs</a>
    </section>
    <section id="post_or_join">
        <div id="post_job">
            <h1>Post a job</h1>
            <a href="profile#post_job" id="post_link">Click here</a>
        </div>
        <div id="create_account">
            @guest
                <h1>Create account</h1>
                <a href="register" id="create_link">Click here</a>
            @endguest

            @auth
            <h1>You are logged in</h1>
            <a href="register" id="create_link">See profile</a>
            @endauth
        </div>
    </section>
    <section id="testimonials_section">
        <h1 class="title">Testimonials</h1>
        @if (count($testimonials) > 0)
            <div class="carousel">
            <img src="./assets/svg/left.svg" id="left-arr" alt="Left arrow">
            @foreach ($testimonials as $testimony)
            <div class="testimony">
                <img src="{{ $testimony->profile_pic }}" alt="{{ $testimony->name }}" class="testimony-image">
                <div class="testimony-text">
                    {{ $testimony->testimonial }}
                </div>
            </div>
            @endforeach
            <img src="./assets/svg/right.svg" id="right-arr" alt="Right arrow">
        </div>
        @else
        <h1>There are currently no testimonials, click <a href="profile#testify">here</a> to testify</h1>
        @endif
        
    </section>
</div>

@endsection