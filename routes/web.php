<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function(){
});


Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});



Route::get('/jobs/index', function ()  {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::all();

    return view('jobs.index',
    [ 'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function(){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id)  {
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs/index', function () {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=>['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id'=>1
    ]);
    return redirect('/jobs/index');
});
