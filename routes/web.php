<?php

use App\Http\Controllers\JobController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
