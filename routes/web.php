<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PrescriptionController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {return view('welcome');})->name('landing');
// Route::get('/', function () {return view('pages\common\home');})->name('landing');
Route::get('/home', function () {return view('pages\common\home');})->name('home');


// Route::get('loginPage', function () { return view('pages.common.login'); })->name('loginPage');

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::match(['get', 'post'], '/logout', [LoginController::class,'logout'])->name('logout');


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('staff')->group(function () {
    // Staff routes
    Route::get('staff_dashboard', function () { return view('staff.dashboard');})->name('staff_dashboard');
});

Route::middleware('customer')->group(function () {
    // Customer routes
    Route::get('customer_dashboard', function () {return view('customer.dashboard');})->name('customer_dashboard');
    Route::post('prescription',[PrescriptionController::class,'store'])->name('savePrescription');
});


//for Testing only - skipping permissions
Route::get('customer_dashboard', function () {return view('customer.dashboard');})->name('customer_dashboard');
Route::post('prescription',[PrescriptionController::class,'store'])->name('savePrescription');

