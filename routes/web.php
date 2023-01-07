<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;

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

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Home'
//     ]);
// })->middleware('auth');

// ? for update all slug in field slug
// Route::get('/slug-update-all', [StudentController::class, 'updateSlugAll']);

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::put('/profileUpdate/{user}', [AuthController::class, 'profileUpdate'])->middleware('auth');
Route::put('/changePassword/{user}', [AuthController::class, 'changePassword'])->middleware('auth');
Route::delete('/destroyAccount/{user}', [AuthController::class, 'destroyAccount'])->middleware('auth');

// * email: admin@gmail.com
// * pass : password

// todo kalau pake middleware buat login, pakein name buat inisialisasi di authenticate nya
// ! guest berfungsi biar kalau udah login, gabisa akses halaman login, dan di tendang ke halaman home. terus buat ganti route defaultnya, bergi ke RouteServicePrivider
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha'])->middleware('guest');


Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'storeRegistrasi'])->middleware('guest');

// ? middleware auth biar kalau belum login gabisa akses yang sudah di auth
// Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/students', [StudentController::class, 'index'])->middleware('auth');

// todo jika bukan admin atau teacher yang login, move in 404
// ? kalau pake slug, ganti parameter {id} jadi {slug}, sebenernya bisa juga id, cuma biar ga bingung
Route::get('/student/{slug}', [StudentController::class, 'show'])->middleware(['auth', 'adminOrTeacher']);
// Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth', 'adminOrTeacher']);
Route::get('/studentCreate', [StudentController::class, 'create'])->middleware(['auth', 'adminOrTeacher']);
// Route::get('/studentAdd', [StudentController::class, 'create'])->middleware(['auth', 'adminOrTeacher']);
Route::post('/studentCreate', [StudentController::class, 'store'])->middleware(['auth', 'adminOrTeacher']);
Route::get('/studentEdit/{slug}', [StudentController::class, 'edit'])->middleware(['auth', 'adminOrTeacher']);
Route::put('/studentUpdate/{slug}', [StudentController::class, 'update'])->middleware(['auth', 'adminOrTeacher']);

// ! kalau pake slug, parameter id ganti jadi slug
// todo implementasi hak akses admin yang udah di buat middleware dan udah di daftarin di kernel
// Route::get('/studentDelete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'admin']);
Route::delete('/studentDestroy/{slug}', [StudentController::class, 'destroy'])->middleware(['auth', 'admin']);
// Route::get('/softDelete', [StudentController::class, 'softDelete'])->middleware(['auth', 'admin']);
Route::get('/trash', [StudentController::class, 'softDelete'])->middleware(['auth', 'admin']);
Route::get('/student/{slug}/restore', [StudentController::class, 'restore'])->middleware(['auth', 'admin']);
Route::delete('/studentForceDelete/{id}', [StudentController::class, 'forceDelete'])->middleware(['auth', 'admin']);
// todo EXPORT/IMPORT
Route::get('/exportPDF', [StudentController::class, 'createPDF'])->middleware(['auth', 'adminOrTeacher']);
Route::get('/exportExcel', [StudentController::class, 'export'])->middleware(['auth', 'adminOrTeacher']);
Route::post('/importExcel', [StudentController::class, 'import'])->middleware(['auth', 'adminOrTeacher']);
// Route::post('users-import', 'import')->name('users.import');

// todo STUDENT MAIL
Route::get('/studentMail/{slug}', [StudentController::class, 'studentMail'])->middleware([
    'auth', 'adminOrTeacher'
]);
Route::post('/sendMail/{slug}', [StudentController::class, 'sendMail'])->middleware([
    'auth', 'adminOrTeacher'
]);

// todo SEND MAIL ALL STUDENT
Route::get('/studentMailAll', [StudentController::class, 'studentMailAll'])->middleware([
    'auth', 'admin'
]);
Route::post('/sendMailAll', [StudentController::class, 'sendMailAll'])->middleware([
    'auth', 'admin'
]);

// todo CLASS
Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/classDetail/{id}', [ClassController::class, 'show'])->middleware('auth');
// todo EXTRACURRICULAR
Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');
// todo TEACHER
Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware('auth');


// ======================= LEARN ROUTE ============================
// contoh buat jalanin route
// Route::get('/about', function(){
//     return 79-3;
// });

// Route::get('/contact', function(){
// return view('contact');
// });

// kalau cuma buat nampilin view || parameter kedua itu nama view nya contact
// Route::view('/contact', 'contact');
// kalau mau kirim data ke view contact kek gini
// Route::view('/contact', 'contact', ['name' => 'Gilang Fauzi']);

// Mengirimkan parameter id
// Route::get('/product/{id}', function ($id) {
//     return view('product/detail', ['id' => $id]);
// });