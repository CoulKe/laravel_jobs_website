<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    //
    public $unlisted = '<p>Not listed</p>';
    public function show($username){
        $user = User::all()->whereIn('username',$username);
        return view('profile.show', ['user'=>$user]);
    }
}
