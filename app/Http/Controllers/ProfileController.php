<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * If username is not set, find the data set using the
     * authenticated user
     */
    public function show($username = ''){
        if ($username !== '') {
            $user = User::all()->whereIn('username',$username);
        }
        else{
            $user = User::all()->whereIn('id', Auth::id());
        }
        return view('profile.show', ['user'=>$user]);
    }
}
