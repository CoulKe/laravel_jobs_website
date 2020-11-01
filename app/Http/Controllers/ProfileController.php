<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Testimonials as Testify;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * If username is not set, find the data set using the
     * authenticated user
     */
    public function index($username = '')
    {
        if ($username !== '') {
            $user = User::all()->whereIn('username', $username);
        } else {
            $user = User::all()->whereIn('id', Auth::id());
        }
        return view('profile.index', ['user' => $user]);
    }

    /**
     * Edit profile details
     */
    public function edit(){
        $user = User::all()->where('id', Auth::id())->first();
        return view('profile.edit',['user' => $user]);
    }
    /**
     * Update profile details
     */
    public function update(){
        
        $user = User::find(Auth::id());
        $user->update([
                'name' => request('name'),
            'email' => request('email'),
            'about' => request('about'),
            'rate' => request('rate'),
            'skills' => request('skills'),
        ]);
        return redirect('/profile');
    }
    /**
     * Save data into the database.
     *@return redirect to avoid resubmission
     */
    public function store(Request $request)
    {
        /**
         * Post job
         */
        if (isset($_POST['post_job'])) {
            $job = new Job();
            $job->company = request('company_name');
            $job->skills_required = request('skills_required');
            $job->description = request('job_description');
            $job->user_id = Auth::id();
            $job->save();
        }
        /**
         * Post testimonial
         */
        if (isset($_POST['testimonial'])) {
         $testify = new Testify();
         $testify->user_id = Auth::id();
         $testify->testimonial = request('testimony');
         $testify->save();
        }

        /**
         * Upload profile picture, if is valid and delete
         * the old photo if it existed
         */
        if ($request->has('profile_pic')) {
            $previous_image = User::find(Auth::id())->profile_pic;

            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            
            $newFileName = Auth::user()->username.'_'.date('his').'.'.$extension;
            $file = $request->file('profile_pic')->storeAs('public/user_images', $newFileName);

            if ($request->file('profile_pic')->isValid()) {
                User::where('id', Auth::id())->update(['profile_pic' => $newFileName]);
                Storage::delete("public/user_images/$previous_image");
            }
        }
        return redirect('/profile');
    }
}
