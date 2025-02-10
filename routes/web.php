<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
  return view('home');
});

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

Route::get("/jobs/create", function () {
  return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
  $job = Job::find($id);

  return view('jobs.show', ['job' => $job]);
});

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

Route::get('/about', function () {
  return view('about');
});

Route::get('/contact', function () {
  return view('contact');
});
