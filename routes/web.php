<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
  return view('home');
});

Route::get('/jobs', function () {
  // $jobs = Job::all();
  // Так можно переходить на конкретную страницу
  $jobs = Job::with('employer')->simplePaginate(3);

  //А так показывается набор, по которому не найти конкретную страницу
  // $jobs = Job::with('employer')->cursorPaginate(5);
  // $jobs = Job::all();

  return view('jobs', [
    'jobs' => $jobs
  ]);
});


Route::get('/jobs/{id}', function ($id) {
  $job = Job::find($id);

  return view('job', ['job' => $job]);
});

Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});
