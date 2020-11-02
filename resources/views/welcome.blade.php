@extends('layouts.layout')
@section('title','Home')
@section('content')
    
<div id="header">
    <div id="header__wrapper" class="container-fluid d-flex flex-column justify-content-center text-center">
        <h1 id="banner-intro">Your dream job awaits you</h1>
        <p id="slogan">just one click away</p>
        <form action="jobs" method="get">
            <input type="search" name="keyword" placeholder="Type keyword">
            <input type="submit" value="Search">
        </form>

    </div>
</div>

<div class="container">
    <section id="latest__section" class="col text-center">
        <h1 class="title">Latest jobs</h1>
        <div class="jobs row justify-content-around">
            @foreach ($jobs as $job)
            <div class="latest__job card col-lg-2 col-md-6 col-sm-12">
                <img src="/storage/user_images/{{$job->profile_pic ?? 'default.png' }}" class="job__image card-img-top" alt="{{ $job->name }}">
                <div class="card-body text-left">
                    <div class="company_title">
                        Company: <a href={{ "profile/.$job->username " }}> {{ $job->company }}</a>
                    </div>
                    <div class="job__description">
                            Description:<br /> {{ $job->description }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="jobs" class="see_more">Browse more jobs</a>
    </section>
    <section id="post_or_join" class="mt-16">
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
            <img src="/svg/left.svg" id="left-arr" alt="Left arrow">
            @foreach ($testimonials as $testimony)
            <div class="testimony">
                <img src="/storage/user_images/{{$user->profile_pic ?? 'default.png' }}" alt="{{ $testimony->name }}" class="testimony-image">
                <div class="testimony-text">
                    {{ $testimony->testimonial }}
                </div>
            </div>
            @endforeach
            <img src="/svg/right.svg" id="right-arr" alt="Right arrow">
        </div>
        @else
        <h1>There are currently no testimonials, click <a href="profile#testify">here</a> to testify</h1>
        @endif
        
    </section>
</div>
<script src="js/slider.js"></script>
@endsection