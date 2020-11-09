<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployerController extends Controller
{
    public function index(Request $request)
    {
        $prefix = '%';
        $suffix = '%';

        if ($request) {
            $employers = User::where('position', 'employer')
                ->paginate(5);
        }
        if (!empty($request->skills) && empty($request->rate)) {
            
            $keyword = $request->skills;
            //replace non word characters with space
            $keyword = preg_replace('/\W+/', ' ', $keyword);
            //split words into array
            $keyword = preg_split('/\W/', $keyword);
            //Join the array with % OR %
            $keyword = join('% OR %', $keyword);
            $keyword = $prefix . $keyword . $suffix;

            $employers = User::where('position', 'employer')
                ->where('users.skills', 'LIKE', $keyword)
                ->paginate(5);
        } elseif (!empty($request->rate) && empty($request->skills)) {

            $keyword = $request->rate;
            // Cast rate to integer
            $keyword = intval($keyword);
            $keyword = $prefix . $keyword . $suffix;

            $employers = User::where('position', 'employer')
                ->where('users.rate', 'LIKE', $keyword)
                ->paginate(5);
        }
        else {
            $keyword = $request->skills;
            //replace non word characters with space
            $keyword = preg_replace('/\W+/', ' ', $keyword);
            //split words into array
            $keyword = preg_split('/\W/', $keyword);
            //Join the array with % OR %
            $keyword = join('% OR %', $keyword);
            $keyword = $prefix . $keyword . $suffix;
            $rate = $request->rate;
            $rate = intval($rate);
            $rate = $prefix . $rate . $suffix;

            $employers = User::where('position', 'employer')
                ->where('users.rate', 'LIKE', $rate)
                ->orWhere('users.skills','LIKE',$keyword)
                ->paginate(5);
        }
        return view('employers', ['employers' => $employers]);
    }
}
