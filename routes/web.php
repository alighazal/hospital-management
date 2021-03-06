<?php

use App\Http\Controllers\hospitalController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\hospitalDoctorsController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
    return view('welcome');
})->name('home');


Route::get('/profile', function () {
   dd(Auth::user());
});

Route::get('/hospital/admin/only', function () {
    dd('Hello Dear Admin');
 })->middleware('hospital_admin');

Route::get('/register', [  RegisterController::class, 'index' ] );
Route::post('/register', [  RegisterController::class, 'store' ] );

Route::get('/login', [  LoginController::class, 'index' ] );
Route::post('/login', [  LoginController::class, 'store' ] );

Route::get('/login/github', [  LoginController::class, 'github' ] );
Route::get('/login/github/redirect', [  LoginController::class, 'githubRedirect' ] );

Route::get('/login/google', [  LoginController::class, 'google' ] );
Route::get('/login/google/redirect', [  LoginController::class, 'googleRedirect' ] );


Route::post('/logout', LogoutController::class );


Route::get('/hospital/create', [hospitalController::class, 'create']);
Route::post('/hospital', [hospitalController::class, 'store']); 
Route::get('/hospital', [hospitalController::class, 'index']); 
Route::delete('/hospital/{hospital}', [hospitalController::class, 'destroy']);
Route::patch('/hospital/{hospital}', [hospitalController::class, 'update']);

Route::get('/doctor', [doctorController::class, 'index']);
Route::post('/doctor', [doctorController::class, 'store']);
Route::get('/doctor/create', [doctorController::class, 'create']);
Route::delete('/doctor/{doctor}', [doctorController::class, 'destroy']);
Route::patch('/doctor/{id}', [doctorController::class, 'update'])->name('doctor.update');

Route::post('/hospital/{hospital}/doctors', [hospitalDoctorsController::class, 'store']);
Route::delete('/hospital/{hospital}/doctors/{doctor}', [hospitalDoctorsController::class, 'destroy']);

Route::post('/patient', [patientController::class, 'store']);
Route::delete('/patient/{patient}', [patientController::class, 'destroy']);
Route::patch('/patient/{patient}', [patientController::class, 'update']); 



