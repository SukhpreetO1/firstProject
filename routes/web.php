<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\crudControler;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin_login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for yo
Route::get('dashboard', 'ur application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/theme', function () {
//     return view('theme.content');   
// });

// CRUD operation with custom pagination
Route::resource('crud', crudControler::class);


// 
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('Admin_login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('profile', [AuthController::class, 'profile'])->name('show');
Route::post('update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


Route::resource('users', UserController::class);    



// Using datatables
Route::get('students', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');
Route::post('/deleteStudent', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
Route::get('/updateStudent', [StudentController::class, 'updateStudent'])->name('updateStudent');



// For forgot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');