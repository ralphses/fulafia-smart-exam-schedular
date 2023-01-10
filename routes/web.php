<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


//PUBLIC ROUTES
Route::prefix('/students')->group(function () {

    Route::view('/register', 'student-register')
        ->name('student.register');

    Route::view('/register/add-courses', 'student-register-course')
        ->name('student.register.course');

    Route::post('/register', [StudentController::class, 'store'])
        ->name('student.register.store');

});

Route::prefix('/schools')->group(function () {

    Route::view('/register', 'school-register')
        ->name('school.register');

    Route::post('/register', [SchoolController::class, 'store'])
        ->name('school.register.store');
});



//AUTHENTICATED ROUTES
Route::prefix('/school')->group(function() {

    Route::view('/', 'school-profile')
    ->name('school.profile');

});

Route::prefix('/course')->group(function () {

    Route::view('/', 'course-all')
        ->name('course.all');

    Route::view('/add', 'new-course')
        ->name('course.new');
});

Route::prefix('timetable')->group(function () {

    Route::view('/', 'timetable-current')
        ->name('timetable.current');

    Route::view('/generate', 'generate_timetable')
        ->name('timetable.generate');
});

Route::prefix('timeslot')->group(function () {

    Route::view('/', 'timeslot-all')
        ->name('timeslot.all');

    Route::view('/new', 'timeslot-new')
        ->name('timeslot.new');
});


Route::prefix('student')->group(function () {

    Route::view('/', 'students-all')
        ->name('student.all');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})
//    ->middleware(['auth', 'verified'])
    ->name('dashboard');


require __DIR__.'/auth.php';
