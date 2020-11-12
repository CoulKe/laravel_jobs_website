<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        if (!isset($request->skills) && !isset($request->rate)) {
            $candidates = User::where('position', 'candidate')
                ->paginate(5);
        } else {
            $keyword = $request->skills;
            //replace non word characters with space
            $keyword = preg_replace('/\W+/', ' ', $keyword);
            //split words into array
            $keyword = preg_split('/\W/', $keyword);
            //Join the array with % OR %
            $keyword = join("%' OR `skills` LIKE '%", $keyword);

            switch ($request) {
                case isset($request->skills) && isset($request->rate):
                    $candidates = User::where('position', 'candidate')
                        ->where('rate', $request->rate)
                        ->whereRaw('`skills` LIKE \'%' . $keyword . '%\'')
                        ->paginate(5);
                    break;
                case !isset($request->skills) && isset($request->rate):
                    $candidates = User::where('position', 'candidate')
                        ->where('rate', $request->rate)
                        ->paginate(5);
                    break;
                case isset($request->skills) && !isset($request->rate):
                    $candidates = User::where('position', 'candidate')
                        ->whereRaw('`skills` LIKE \'%' . $keyword . '%\'')
                        ->paginate(5);
                    break;

                default:
                    break;
            }
        }

        return view('candidates', ['candidates' => $candidates]);
    }
}
