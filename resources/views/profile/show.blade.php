@extends('layouts.layout')
@section('title', 'profile')

@section('content')
@foreach ($user as $user)
<section class="sub-menu">
    <ul>
        {{ $user->position === 'candidate' ? '<li><a href="#rate">Rate</a></li>' : '' }}
        <li><a href="#about">About</a></li>
        {{ $user->position === 'candidate' ? '<li><a href="#skills">Skills</a></li>' : '' }}
        <li><a href="#contact">Contact</a></li>
    </ul>
</section>
<div class="profile">
    <div class="profile-center">
        <img src="..{{ $user->profile_pic ?? '/assets/user_images/default.png' }}" alt={{ $user->username }} class="profile_pic"> <br>
        <p class="profile_name">{{ $user->name ?? '' }}</p>        
    </div>
</div>
@endforeach
@endsection