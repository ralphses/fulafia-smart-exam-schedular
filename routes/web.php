<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExamCentersController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\TimeTableController;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/register', [StudentController::class, 'create'])
        ->name('student.register');

    Route::view('/register/add-courses', 'student-register-course')
        ->name('student.register.course');

    Route::post('/register', [StudentController::class, 'store'])
        ->name('student.register.store.reg');

    Route::get('/register/faculty/{schoolId}', [StudentController::class, 'registerFacultyStart'])
        ->name('student.register.store.start');

    Route::post('/register/faculty', [StudentController::class, 'registerFaculty'])
        ->name('student.register.store.faculty');

    Route::get('/register/courses/{departmentId}', [StudentController::class, 'registerCourses'])
        ->name('student.register.store.courses');

    Route::post('/register/courses', [StudentController::class, 'registerCourses'])
        ->name('student.register.store.courses');

});

Route::prefix('/schools')->group(function () {

    Route::view('/register', 'school-register')
        ->name('school.register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('school.register.store.old');

});



//AUTHENTICATED ROUTES
Route::prefix('/school')->middleware(['auth', 'verified'])->group(function() {

    Route::get('/', [SchoolController::class, 'index'])
    ->name('school.profile');

    Route::patch('/update', [SchoolController::class, 'update'])
        ->name('school.update');

});

Route::prefix('/department')->middleware(['auth', 'verified'])->group(function() {

    Route::get('/', [DepartmentController::class, 'index'])
        ->name('department.all');

    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])
        ->name('department.update');

    Route::patch('/edit/{id}', [DepartmentController::class, 'update'])
        ->name('department.update');

    Route::patch('/change-status/{id}', [DepartmentController::class, 'status'])
        ->name('department.status');

    Route::get('/new', [DepartmentController::class, 'create'])
        ->name('department.create');

    Route::post('/new', [DepartmentController::class, 'store'])
        ->name('department.store');

});

Route::prefix('/course')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [CourseController::class, 'index'])
        ->name('course.all');

    Route::get('/add', [CourseController::class, 'create'])
        ->name('course.new');

    Route::get('/edit/{id}', [CourseController::class, 'edit'])
        ->name('course.edit');

    Route::patch('/update/{id}', [CourseController::class, 'update'])
        ->name('course.update');

    Route::patch('/change-status/{id}', [CourseController::class, 'status'])
        ->name('course.status');

    Route::post('/add', [CourseController::class, 'store'])
        ->name('course.new');
});

Route::prefix('/faculty')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [FacultyController::class, 'index'])
        ->name('faculty.all');

    Route::view('/new', 'new-faculty')
        ->name('faculty.new');

    Route::post('/new', [FacultyController::class, 'store'])
        ->name('faculty.store');

    Route::patch('/edit/{id}', [FacultyController::class, 'update'])
        ->name('faculty.update');

    Route::get('/edit/{id}', [FacultyController::class, 'edit'])
        ->name('faculty.edit');

    Route::patch('/change-status/{id}', [FacultyController::class, 'status'])
        ->name('faculty.status');
});

Route::prefix('timetable')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [TimeTableController::class, 'index'])
        ->name('timetable.current');

    Route::get('/generate', [TimeTableController::class, 'create'])
        ->name('timetable.generate');

    Route::post('/generate', [TimeTableController::class, 'store'])
        ->name('timetable.generate');

    Route::post('/finish', [TimeTableController::class, 'finish'])
        ->name('timetable.finish');
});

Route::prefix('timeslot')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [TimeSlotController::class, 'index'])
        ->name('timeslot.all');

    Route::get('/new', [TimeSlotController::class, 'create'])
        ->name('timeslot.new');

    Route::post('/new', [TimeSlotController::class, 'store'])
        ->name('timeslot.store');

    Route::delete('/status/{id}', [TimeSlotController::class, 'destroy'])
        ->name('timeslot.remove');
});


Route::prefix('student')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [StudentController::class, 'index'])
        ->name('student.all');

    Route::delete('/status/{id}', [StudentController::class, 'destroy'])
        ->name('student.remove');

});

Route::prefix('exam-centers')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [ExamCentersController::class, 'index'])
        ->name('exam_center.all');

    Route::get('/new', [ExamCentersController::class, 'create'])
        ->name('exam_center.new');

    Route::post('/new', [ExamCentersController::class, 'store'])
        ->name('exam_center.store');

    Route::get('/edit/{id}', [ExamCentersController::class, 'show'])
        ->name('exam_center.show');

    Route::patch('/status/{id}', [ExamCentersController::class, 'update'])
        ->name('exam_center.status');

    Route::delete('/status/{id}', [ExamCentersController::class, 'destroy'])
        ->name('exam_center.status');

});

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [SchoolController::class, 'dashboard'])
        ->name('dashboard');
});

require __DIR__.'/auth.php';
