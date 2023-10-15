<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//authenticating user
// Route::post('/users/authenticate',[HomeController::class,'authenticate'])->name('authenticate');
Auth::routes();




Route::get('/home', [HomeController::class, 'index'])->name('home');




//Doctors
Route::get('/home/doctors_table', [DoctorController::class, 'doctors_table'])->name('doctors_table');
Route::get('/home/details_table', [DoctorController::class, 'details_table'])->name('details_table');

Route::post('/home/create_doctor', [DoctorController::class, 'create'])->name('create_doctor');

Route::get('/home/doctors_form', [DoctorController::class, 'index'])->name('doctors_form');
// Route::get('/home/education_form', [DoctorController::class, 'education_form'])->name('education_form');




//Admin
Route::get('/home/users_table', [AdminController::class, 'users_table'])->name('users_table');
Route::get('/home/users_details_table', [AdminController::class, 'user_details_table'])->name('users_details_table');
Route::get('/home/users_form', [AdminController::class, 'users_form'])->name('users_form');

Route::get('/home/edit_form/{user_id}', [AdminController::class, 'edit_form'])->name('edit_form');
Route::put('/home/edit_user/{user_id}', [AdminController::class, 'update'])->name('edit_users');

Route::delete('/home/delete_users/{user}', [AdminController::class, 'delete'])->name('delete_users');

Route::post('/home/add_users', [AdminController::class, 'create'])->name('add_users');





