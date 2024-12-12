<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DebugController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;

//Route::redirect('/', '/under-construction');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/under-construction', [HomeController::class, 'under_construction'])->name('under_construction');
Route::get('/project/{id}', [ProjectController::class, 'detail'])->name('project.detail');
Route::get('/projects', [ProjectController::class, 'all'])->name('project.all');
Route::post('/contact', [ContactController:: class, 'index'])->name('contact');




// Route::get('/a', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/a/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    #PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    #PROJECT
    Route::get('/a/project', [ProjectController::class, 'user_index'])->name('project.user.index');
    Route::get('/a/project/load', [ProjectController::class, 'load'])->name('project.user.load');
    Route::post('/a/project/upload', [ProjectController::class, 'user_upload'])->name('project.user.upload');
    Route::delete('/a/{id}/delete/project/{project_id}', [DebugController::class, 'delete_project'])->name('delete.project');

    #MEDIA
    Route::get('/a/media', [MediaController::class, 'user_index'])->name('media.user.index');
    Route::get('/a/media/load', [MediaController::class, 'load'])->name('media.user.load');
    Route::post('/a/media/upload', [MediaController::class, 'user_upload'])->name('media.user.upload');
    Route::delete('/a/{id}/delete/media/{media_id}', [DebugController::class, 'delete_media'])->name('delete.media');


});



require __DIR__.'/auth.php';
