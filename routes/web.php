<?php

use App\Http\Controllers\candidateController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $jobs = DB::table('jobs')
        ->join('users', 'user_id', '=', 'users.id')
        ->latest('jobs.created_at')
        ->limit(4)
        ->get();
    $testimonials = DB::table('testimonials')
        ->join('users', 'user_id', '=', 'users.id')
        ->limit(6)
        ->get();

    return view('welcome', [
        'jobs' => $jobs,
        'testimonials' => $testimonials,
    ]);
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [JobController::class, 'index']);
    Route::get('/{id}', [JobController::class, 'show'])->where(['id' => '[0-9]+']);
});

Route::get('/employers', [EmployerController::class, 'index']);
Route::get('/candidates', [CandidateController::class, 'index']);

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'index'])->middleware('auth');
    Route::post('/', [ProfileController::class, 'store'])->middleware('auth');

    Route::get('/edit', [ProfileController::class, 'edit'])->middleware('auth');
    Route::post('/edit', [ProfileController::class, 'update'])->middleware('auth');

    Route::get('/{username}', [ProfileController::class, 'index']);
    Route::post('/{username}', [ProfileController::class, 'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
