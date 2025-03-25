<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'home');

Route::controller(JobController::class)->group(function(){
    // Route::get('/jobs/index', action:  'index');
    // Route::get('/jobs/create',  'create');
    // Route::get('/jobs/{job}',  'show');
    // Route::post('/jobs/index',  'store');
    // Route::get('/jobs/{job}/edit',  'edit');
    // Route::patch('/jobs/index/{job}',  'update');
    // Route::delete('/jobs/{job}',  'delete');



});

Route::resource('jobs', JobController::class
    // 'only' => ['jobs.index', 'jobs.show', 'jobs.create', 'jobs.store']
);


Route::view('/about', 'about');
Route::view('/contact', 'contact');


//  auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

