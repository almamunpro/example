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


// index
Route::get('/jobs/index', function ()  {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    // $jobs = Job::all();

    return view('jobs.index',
    [ 'jobs' => $jobs
    ]);
});

// create
Route::get('/jobs/create', function(){
    return view('jobs.create');
});

// show
Route::get('/jobs/{id}', function ($id)  {
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
});


// Store
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


Route::get('/jobs/{id}/edit', function ($id)  {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

Route::patch('/jobs/index/{id}/edit', function ($id)  {
    // validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary'=>['required']
    ]);
    //authorize (ON hold)
    //update the job
    $job= Job::findOrFail($id); //null

    // $job->title = request('title');
    // $job->salary = request('salary');

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    //and persist
    return redirect('/jobs/index '. $job ->id);

});
// destroy
Route::delete('/jobs/{id}/edit', function ($id)  {
    // authorize (On Hold)

    //delete the job
    Job::findOrFail($id)->delete();

    // redirect
    return redirect('/jobs/index/');
});
