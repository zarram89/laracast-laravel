<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
  return view('home');
});

// Index
Route::get('/jobs', function () {
  // $jobs = Job::all();
  // Так можно переходить на конкретную страницу
  $jobs = Job::with('employer')->latest()->simplePaginate(20);

  //А так показывается набор, по которому не найти конкретную страницу
  // $jobs = Job::with('employer')->cursorPaginate(5);
  // $jobs = Job::all();

  return view('jobs.index', [
    'jobs' => $jobs
  ]);
});

// Create
Route::get("/jobs/create", function () {
  return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
  $job = Job::find($id);

  return view('jobs.show', ['job' => $job]);
});

// Store
Route::post('/jobs', function () {
  // dd(request()->all()); - вывести все данные из запроса
  // dd(request('title')); - вывести заголовок из запроса
  request()->validate(  [
    'title'=> ['required', 'min:3'],
    'salary'=> ['required'],
  ]);

  Job::create([
    'title'=> request('title'),
    'salary' => request('salary'),
    'employer_id'=> 1,
  ]);

  return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
  $job = Job::find($id);

  return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
  // validate
  request()->validate([
    'title' => ['required', 'min:3'],
    'salary' => ['required']
]);

  // authorize (On hold...)

  // update the job
  $job = Job::findOrFail($id); // null

  // $job->title = request('title');
  // $job->salary = request('salary');
  // $job->save();

  $job->update([
    'title' => request('title'),
    'salary' => request('salary'),
]);

  // redirect to the job page
  return redirect("/jobs/{$job->id}");
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
  // authorize (On hold...)

  //delete the job
  // Job::findOrFail($id)->delete()

  $job = Job::findOrFail($id);
  $job->delete();

  // redirect to the jobs page
  return redirect('/jobs');
});

// About
Route::get('/about', function () {
  return view('about');
});

// Contact
Route::get('/contact', function () {
  return view('contact');
});
