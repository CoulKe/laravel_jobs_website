<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
    public function store(){
        $user = new User();

       if (isset($_POST['post_job'])) {
        $job = new Job();
        $job->company = request('company_name');
        $job->skills_required = request('skills_required');
        $job->description = request('job_description');
        $job->user_id = Auth::id();
        $job->save();
       }

        /**
         * Upload profile picture, if is valid and delete
         * the old photo if it existed
         */
        if ($request->has('profile_pic')) {
            $previous_image = User::find(Auth::id())->profile_pic;
            $filename = $request->file('profile_pic')->store('user_images');

            if ($request->file('profile_pic')->isValid()) {
                User::where('id', Auth::id())->update(['profile_pic' => $filename]);
                Storage::delete($previous_image);
            }
       if ($_POST['upload_pic']) {
           $user = new User();
           $user->profile_pic = request('profile_pic');
           error_log($user);
        }
        return redirect('/profile');
    }
}
