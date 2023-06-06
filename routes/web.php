<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\blogCategory;
use App\Http\Controllers\crudControler;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'is_verify_email'], function () {
    Auth::routes();
    Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['Admin_login']);
    Route::get('user_dashboard', [AuthController::class, 'user_dashboard']);
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('profile', [AuthController::class, 'profile'])->name('show');
Route::post('update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');


// to verify the
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');


// to change the password
Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');


// to get the details of users in admin portal
Route::resource('users', UserController::class);


// for blog page
Route::resource('blog', PostsController::class)->middleware('blog', 'Admin_loginBLOG TITLE');
Route::post('ckeditor/upload', [PostsController::class, 'upload'])->name('ckeditor.upload');
Route::resource('admin/posts', AdminBlogController::class);


// for categories in blog
Route::resource('categories', blogCategory::class);
Route::get('changeStatus', [blogCategory::class, 'changeStatus']);


// Using datatables
Route::get('students', [StudentController::class, 'index']);
Route::get('students/list', [StudentController::class, 'getStudents'])->name('students.list');
Route::post('/getStudentData', [PagesController::class, 'getStudentData'])->name('getStudentData');
Route::post('/deleteStudent', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
Route::post('/updateStudent', [StudentController::class, 'updateStudent'])->name('updateStudent');


// For forgot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// blog page
// Route::view('/blog/view', 'view');