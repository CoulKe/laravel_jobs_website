@extends('layouts.layout')
@section('title', $user->first()->name)

@section('content')
<div class="container">
    <form action="" method="POST" id="edit_details_form">
        @csrf
        
        <h1 class="title">Edit profile</h1>
        <label for="First name">First name: </label> <br>
        <input type="text" name="name" id="fName" required="required" value={{ $user->name }}>
        <br>
        <label for="email">Email: </label> <br>
        <input type="text" name="email" id="email" required="required" autocomplete="off" value={{ $user->email }}>
        <br>
        <label for="rate">Rate per Hour(USD): </label> <br>
        <input type="number" name="rate" id="rate" value={{ $user->rate }}>
        <br>
        <label for="about">About</label> <br>
        <textarea name="about" id="about" cols="30" rows="10">{{ $user->about }}</textarea> <br>
        <label for="skills">Skills <span>(Separate them with a comma if many)</span></label> <br>
        <textarea name="skills" id="skills" cols="30" placeholder="e.g Php, Javascript, Photoshop" rows="10">{{ $user->skills}}</textarea> <br>
        
        <input type="submit" name="edit_profile" value="Save edit"> <br>
    </form>
</div>
@endsection