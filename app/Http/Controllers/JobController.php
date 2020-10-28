<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //
    public function index()
    {
        $collection = DB::table('jobs')
        ->join('users','user_id','=','users.id')
        ->select('*')
        ->paginate(5);
        return view('jobs.index', [
            'collection' => $collection,
        ]);
    }
    public function show($id){
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }
}
