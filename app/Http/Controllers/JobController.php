<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('search')) {

            $prefix = '%';
            $suffix = '%';
            $keyword = $request->search;
            //replace non word characters with space
            $keyword = preg_replace('/\W+/', ' ', $keyword);
            //split words into array
            $keyword = preg_split('/\W/', $keyword);
            //Join the array with % OR %
            $keyword = join('% OR %', $keyword);
            $keyword = $prefix . $keyword . $suffix;

            //Use keyword to search in jobs.skills_required and jobs.description
            $jobs = DB::table('jobs')
                ->join('users', 'user_id', '=', 'users.id')

                ->where('jobs.skills_required', 'LIKE', $keyword)
                ->orWhere('jobs.description', 'LIKE', $keyword)
                ->paginate(2);
        } else {
            $jobs = DB::table('jobs')
                ->join('users', 'user_id', '=', 'users.id')
                ->select('*')
                ->paginate(2);
        }

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }
    public function show(Request $request)
    {
        $collection = DB::table('jobs')
            ->join('users', 'user_id', '=', 'users.id')
            ->where('jobs.id', '=', $request->id)
            ->first();
        $job['name'] = $collection->name;
        $job['company'] = $collection->company;
        $job['description'] = $collection->description;
        return view('jobs.show', [
            'job' => $job
        ]);
    }
}
