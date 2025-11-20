<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Gate;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/jobs/create', function() {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    
    if (!$job) {
        abort(404);
    }

    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

Route::post('/jobs', function() {
    $attributes = request()->validate([
        'title' => ['required', 'string', 'min:3', 'max:255'],
        'salary' => ['required', 'string', 'min:3', 'max:255']
    ]);

    // Get or create a default employer
    $employer = \App\Models\Employer::first();
    
    if (!$employer) {
        // Create a default employer if none exists
        $employer = \App\Models\Employer::create([
            'name' => 'Default Employer',
            'user_id' => \App\Models\User::first()->id,
        ]);
    }

    $job = Job::create([
        'title' => $attributes['title'],
        'salary' => $attributes['salary'],
        'employer_id' => $employer->id,
    ]);

    return redirect()->route('jobs.show', $job);
});

//Edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    Gate::authorize('edit-job', $job);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    Gate::authorize('edit-job', $job);
    request()->validate([
        'title' => ['required', 'string', 'min:3', 'max:255'],
        'salary' => ['required', 'string', 'min:3', 'max:255']
    ]); 
    //autherize

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs');
});

// Delete
Route::delete('/jobs/{id}', function ($id) {
    Gate::authorize('edit-job', $job);
    $job = Job::findOrFail($id)->delete();
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);