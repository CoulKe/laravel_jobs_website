@extends('layouts.layout')
@section('title', 'employers')
    
@section('content')
<div class="container candidates-page">
    <aside>
        <form action="" method="post">
            <label for="Skills search">Skills search:</label> <br>
            <input type="text" name="skills_search" placeholder="type keywords"> <br>
            <label for="Rate">Rate per hour (USD):</label> <br>
            <input type="text" name="rate_search" placeholder="search rate"> <br>
            <input type="submit" value="Search">
        </form>
    </aside>
    <section class="candidates-section">
        <h1 class="title">Employers</h1>

        @foreach ($employers as $employer)
        <div class="candidate">
            
            @if (empty($employer->profile_url))
                <img src="/storage/user_images/{{$employer->profile_pic ?? 'default.png' }}" alt={{ $employer->username }} class='candidate_image'>
            @endif
            <div class="candidate_details">
                <div class="candidate_name">Name: {{ $employer->first_name }}</div>
                <div class="candidate_rate">Rate per hour: {{  $employer->rate == 0 ? 'Negotiable' : $employer->rate }}</div>
                <div class="candidate_skills"> Skills: {{  $employer->skills == '' ? 'Not listed' : $employer->skills }} </div>
                <a href="profile?username={{ $employer->username }}" >View profile</a>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection