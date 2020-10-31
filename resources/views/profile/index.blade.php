@extends('layouts.layout')
@section('title', $user->first()->name ?? '')
@php
    $unlisted = '<p>Not listed</p>';
@endphp
@section('content')
 @if (count($user) <= 0)
     <h1>Sorry, that user doesn't exist</h1>
 @else
        @foreach ($user as $user)
    
        <section class="sub-menu">
            <ul>
                
                {!! $user->position === 'candidate' ? '<li><a href="#rate">Rate</a></li>' : '' !!}
                <li><a href="#about">About</a></li>
                {!! $user->position === 'candidate' ? '<li><a href="#skills">Skills</a></li>' : '' !!}
                <li><a href="#contact">Contact</a></li>
                
                @auth
                  @if ($user->id === Auth::id())
                        @if ($user->position === 'employer')
                            <li><a href="#post_job">Post job</a></li>
                        @endif
                   <li><a href="#testify">Testify</a></li>
                  @endif
                @endauth

            </ul>
        </section>
        <div class="profile">
            <div class="profile-center">
                <img src="/storage/user_images/{{$user->profile_pic ?? 'default.png' }}" alt={{ $user->username }} class="profile_pic"> <br>
                <p class="profile_name">{{ $user->name ?? '' }}</p>
                @if ($user->id === Auth::id())
                <form method="post" id="upload-profile" enctype="multipart/form-data">
                    @csrf
                    <label for="Upload">Add profile picture: </label> <br>
                    <input type="file" name="profile_pic"> <br>
                    <input type="submit" name="upload_pic" value="submit" id="submit">
                </form>
                <a href="file_upload" id="add-pic-link">Add profile picture</a> <br/>
                <a href="/profile/edit">edit details</a>
                @endif
            </div>
        </div>

        <div class="details_section container">
            @if ($user->position === 'candidate')
                <h1 id='rate'>Rate</h1>
                @if ($user->rate > 0) {{ $user->rate }} @else  {!! $unlisted !!}  @endif
            @endif

            <h1 id="about">About</h1>
            <p class="profile_bio"> {{ $user->about }} </p>

            @if ($user->position === 'candidate')
                <h1 id="skills">Skills</h1>
                <p>{{ $user->skills }}</p>
            @endif
            <h1 id="contact">Contact</h1>
            <p>Email: <a href="mailto: {{ $user->email }}">{{ $user->email }}</a> </p>

            @if ($user->id === Auth::id())
            <form method="POST" id="testify" class="testimonial_form">
                @csrf
                <legend>Testimonial form</legend>
                <label for="Testimonial">Testimonial:</label> <br>
                <textarea name="testimonial" cols="30" rows="10"></textarea> <br>
                <input type="submit" name="testimonial" value="Share testimonial">
            </form>
            @endif

            @if ($user->id === Auth::id())
            <form method="POST" action="" id="post_job" class="job_post_form">
                @csrf
                <legend>Fill this to post job</legend>
                <label for="Company name">Company name:</label> <br>
                <input type="text" name="company_name"> <br>
                <label for="Skills required">Skills required:
                    <span>(Separate them with commas)</span></label> <br>
                <input type="text" name="skills_required"> <br>
                <label for="Job description">Job description:</label> <br>
                <textarea name="job_description" cols="30" rows="10"></textarea> <br>
                <input type="submit" name="post_job" value="Post job">
            @endif
        </div>
        @endforeach
 @endif


@endsection