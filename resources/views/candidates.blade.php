@extends('layouts.layout')
@section('title', 'candidates')

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
        <h1 class="title">Candidates</h1>

        @foreach ($candidates as $candidate)
        <div class="candidate">
            
            @if (empty($candidate->profile_url))
                <img src="/storage/user_images/{{$candidate->profile_pic ?? 'default.png' }}" alt={{ $candidate->username }} class='candidate_image'>
            @endif
            <div class="candidate_details">
                <div class="candidate_name">Name: {{ $candidate->first_name }}</div>
                <div class="candidate_rate">Rate per hour: {{  $candidate->rate == 0 ? 'Negotiable' : $candidate->rate }}</div>
                <div class="candidate_skills"> Skills: {{  $candidate->skills == '' ? 'Not listed' : $candidate->skills }} </div>
                <a href="profile?username={{ $candidate->username }}" >View profile</a>
            </div>
        </div>
        @endforeach
    </section>
</div>
@endsection