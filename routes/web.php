<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MenubarController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', [HomeController::class, 'index'])->name('main');

Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');


Auth::routes();




Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/view/{id}', [PageController::class, 'dynamic'])->name('dynamic_view');

//Notification
Route::get('/markasread', [BookingController::class, 'markasread'])->name('markasread');
Route::get('/markasread1', [BookingController::class, 'markasread1'])->name('markasread1');





//Doctors
Route::get('/home/doctors_table', [DoctorController::class, 'doctors_table'])->name('doctors_table');
Route::get('/home/details_table', [DoctorController::class, 'details_table'])->name('details_table');

Route::post('/home/create_doctor', [DoctorController::class, 'create'])->name('create_doctor');

Route::get('/home/doctors_form', [DoctorController::class, 'index'])->name('doctors_form');
// Route::get('/home/education_form', [DoctorController::class, 'education_form'])->name('education_form');


Route::post('/home/doctors', [HomeController::class, 'filter'])->name('filter_doctor');


//Admin
Route::get('/home/users_table', [AdminController::class, 'users_table'])->name('users_table');
Route::get('/home/users_details_table', [AdminController::class, 'user_details_table'])->name('users_details_table');
Route::get('/home/users_form', [AdminController::class, 'users_form'])->name('users_form');

Route::get('/home/edit_form/{user_id}', [AdminController::class, 'edit_form'])->name('edit_form');
Route::put('/home/edit_user/{user_id}', [AdminController::class, 'update'])->name('edit_users');

Route::get('/home/change-password/{id}', [AdminController::class, 'change_form'])->name('change_form');
Route::post('home/{id}/change-password', [AdminController::class, 'changepassword'])->name('changepassword');

Route::delete('/home/delete_users/{user}', [AdminController::class, 'delete'])->name('delete_users');

//Admin--doctors
Route::get('/home/doctors_table', [AdminController::class, 'doctors_table'])->name('doctors_table');
Route::get('/home/doctors_form', [AdminController::class, 'doctors_form'])->name('doctors_form');
Route::post('/home/add_doctors', [AdminController::class, 'add_doctors'])->name('add_doctors');
Route::delete('/home/delete_doctor/{doctor}', [AdminController::class, 'delete_doctor'])->name('delete_doctor');
Route::get('/home/edit_doctor/{doctor_id}', [AdminController::class, 'edit_doctor'])->name('edit_doctor');
Route::put('/home/edit_doc/{doctor_id}', [AdminController::class, 'update_doctor'])->name('edit_doc');

Route::get('/home/view_doctor/{doctor_id}', [AdminController::class, 'view_doctor'])->name('view_doctor');


Route::post('/home/add_users', [AdminController::class, 'create'])->name('add_users');



//Departments
Route::get('/home/department_table', [DepartmentController::class, 'index'])->name('department_table');
Route::get('/home/department_form', [DepartmentController::class, 'add_department'])->name('department_form');

Route::post('/home/add_department', [DepartmentController::class, 'create'])->name('add_department');
Route::delete('/home/delete_department/{department}', [DepartmentController::class, 'delete'])->name('delete_department');

Route::get('/home/edit_department/{department_id}', [DepartmentController::class, 'edit_department'])->name('edit_department');
Route::put('/home/edit_department/{department_id}', [DepartmentController::class, 'update'])->name('update_department');


//Trash
Route::resource('trash', TrashController::class);

Route::post('trash/restore/{user_id}', [TrashController::class, 'restore'])->name('restore');


//Schedule
Route::resource('schedule', ScheduleController::class);
// Route::post('/schedule/store/{doctors_id}', [ScheduleController::class, 'store'])->name('schedule.data');


//Booking
Route::resource('booking', BookingController::class);

//Appointments
Route::resource('appointment', AppointmentController::class);

//Patient
Route::resource('patient', PatientController::class);

//Menu Controller
Route::resource('menubar', MenubarController::class);

//Page
Route::resource('page', PageController::class);

//FAQ's
Route::resource('faq', FaqController::class);

//Feedback
Route::resource('feedback', FeedbackController::class);
