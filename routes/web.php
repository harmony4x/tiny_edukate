<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/',[HomePageController::class,'index'])->name('index');
Route::get('/chi-tiet/{slug}',[HomePageController::class,'detail'])->name('detail');
Route::get('/contact',[HomePageController::class,'contact'])->name('contact');
Route::get('/tat-ca-khoa-học',[HomePageController::class,'all_course'])->name('all_course');
Route::get('/danh-muc/{slug}',[HomePageController::class,'category_course'])->name('category_course');
Route::get('/tra-cuu-diem-thi',[HomePageController::class,'search_score'])->name('search_score');
Route::get('/dang-ky-khoa-hoc',[HomePageController::class,'register'])->name('register');



//Admin

Route::resource('/admin/category',CategoryController::class);
Route::resource('/admin/course',CourseController::class);
Route::resource('/admin/contact',ContactController::class);
Route::resource('/admin/testimonial',TestimonialController::class);
Route::resource('/admin/user',UserController::class);
Route::get('/admin/course/detail/{course_code}',[CourseController::class,'course_detail'])->name('course.detail');

//Dashboard
Route::get('/admin/dashboard',[HomeController::class,'index'])->name('dashboard');
Route::post('/filter-by-date',[DashboardController::class,'filter_by_date']);
