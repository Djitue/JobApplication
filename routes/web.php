<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employer\dashboard\PostJobController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::middleware(['auth', 'role:jobseeker'])->group(function () {
//     Route::get('/jobseeker/dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');
//     Route::get('/jobseeker/search-jobs', [JobSeekerController::class, 'searchJobs'])->name('jobseeker.searchJobs');
//     Route::get('/jobseeker/application-history', [JobSeekerController::class, 'applicationHistory'])->name('jobseeker.applicationHistory');
//     Route::get('/jobseeker/profile', [JobSeekerController::class, 'profile'])->name('jobseeker.profile');
// });



Route::prefix('employer')->middleware('auth:employer')->group(function () {
    Route::get('/post-job', [PostJobController::class, 'create'])->name('employer.post-job');
    Route::post('/postJob', [PostJobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs', [PostJobController::class, 'index'])->name('employer.jobs.index');
    Route::get('/jobs/edit/{id}', [PostJobController::class, 'edit'])->name('employer.jobs.edit');
    Route::put('/jobs/{id}', [PostJobController::class, 'update'])->name('employer.jobs.update');
    Route::delete('/jobs/{id}', [PostJobController::class, 'destroy'])->name('employer.jobs.destroy');
    Route::get('/jobs/{id}/applications', [PostJobController::class, 'viewApplications'])->name('employer.jobs.applications');

});

Route::get('/jobs/detail/{id}', [HomeController::class, 'detail'])->name('job-detail');
Route::get('/jobs', [JobListController::class, 'index'])->name('jobs');


require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/employer-auth.php';
