<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserNewsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', function () {
    return redirect()->route('login');
})->name('redirect.login');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('courses', CourseController::class);
        Route::resource('news', NewsController::class);
    });

Route::middleware(['auth','verified'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserCourseController::class, 'index'])->name('dashboard');
        Route::post('/enroll/{course}', [UserCourseController::class, 'enroll'])->name('enroll');
        Route::delete('/leave/{course}', [UserCourseController::class, 'leave'])->name('leave');
        Route::get('/news', [UserNewsController::class, 'index'])->name('news.index');
        Route::get('/news/{id}', [UserNewsController::class, 'show'])->name('news.show');
    });

require __DIR__.'/auth.php';
