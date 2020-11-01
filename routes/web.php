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

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/',[JobController::class, 'index']);
    Route::get('/{id}',[JobController::class, 'show']);
});

Route::get('/employers',function(){
    $employers = User::all()->whereIn('position','employer');
    
    return view('employers', ['employers'=>$employers]);
});
Route::get('/candidates',function(){
    $candidates = User::all()->whereIn('position','candidate');
    
    return view('candidates', ['candidates'=>$candidates]);
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/',[ProfileController::class, 'index'])->middleware('auth');
    Route::post('/',[ProfileController::class, 'store'])->middleware('auth');

    Route::get('/edit',[ProfileController::class, 'edit'])->middleware('auth');
    Route::post('/edit',[ProfileController::class, 'update'])->middleware('auth');

    Route::get('/{username}',[ProfileController::class, 'index']);
    Route::post('/{username}',[ProfileController::class, 'store']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
