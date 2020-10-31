<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/jobs',[JobController::class, 'index']);
Route::get('/jobs/{id}',[JobController::class, 'show']);
Route::get('/employers',function(){
    $employers = User::all()->whereIn('position','employer');
    
    return view('employers', ['employers'=>$employers]);
});
Route::get('/candidates',function(){
    $candidates = User::all()->whereIn('position','candidate');
    
    return view('candidates', ['candidates'=>$candidates]);
});
Route::get('/profile',[ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile',[ProfileController::class, 'store'])->middleware('auth');

Route::get('/profile/edit',[ProfileController::class, 'edit'])->middleware('auth');
Route::post('/profile/edit',[ProfileController::class, 'update'])->middleware('auth');

Route::get('/profile/{username}',[ProfileController::class, 'index']);
Route::post('/profile/{username}',[ProfileController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
