<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        // $jobs = Job::all();

        return view('jobs.index',
        [ 'jobs' => $jobs
        ]);
    }
    public function create(){
        return view('jobs.create');

    }
    public function show(Job $job)
    {

        return view( 'jobs.show', ['job' => $job]);

    }
    public function store(Job $job){
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
    }
    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);

    }
    public function update(Job $job){
// validate
request()->validate([
    'title' => ['required', 'min:3'],
    'salary'=>['required']
]);
//authorize (ON hold)
//update the job
// $job= Job::findOrFail($id); //null

// $job->title = request('title');
// $job->salary = request('salary');

$job->update([
    'title' => request('title'),
    'salary' => request('salary'),
]);
//and persist
return redirect('/jobs/'.$job ->id);
    }

    public function delete(Job $job){
        $job->delete();
        // redirect
        return redirect('/jobs/index');
    }

}
