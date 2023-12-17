<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\QuatationController;
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
Route::get('/', function () {return view('welcome');})->name('home');
Route::get('loginPage', function () { return view('pages.common.login'); })->name('loginPage');

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::match(['get', 'post'], '/logout', [LoginController::class,'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('staff')->group(function () {
    // Staff routes
    Route::get('staff_dashboard', function () { return view('staff.dashboard');})->name('staff_dashboard');
    Route::get('/prescriptions/staff', [PrescriptionController::class, 'indexForStaff']);
    Route::get('/quatations/create', [QuatationController::class, 'create'])->name('quatation.create');
    Route::get('/quatations/index', [QuatationController::class, 'index'])->name('quatation.index');
    Route::get('/quatations/create', [QuatationController::class, 'create'])->name('quatation.create');
    Route::post('/quatations/store', [QuatationController::class, 'store'])->name('quatation.store');
    
});

Route::middleware('customer')->group(function () {
    // Customer routes
    Route::get('customer_dashboard', function () {return view('customer.dashboard');})->name('customer_dashboard');
    Route::get('/prescriptions/customer', [PrescriptionController::class, 'indexForCustomer'])->name('prescriptions.indexForCustomer');
    Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
    Route::post('prescription',[PrescriptionController::class,'store'])->name('savePrescription');

});


//for Testing only - skipping permissions
// Route::get('customer_dashboard', function () {return view('customer.dashboard');})->name('customer_dashboard');

// Route::get('/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
// Route::get('/prescriptions/customer', [PrescriptionController::class, 'indexForCustomer'])->name('prescriptions.indexForCustomer');
// Route::get('/prescriptions/staff', [PrescriptionController::class, 'indexForStaff']);
// Route::post('prescription',[PrescriptionController::class,'store'])->name('savePrescription');


// Route::get('/quatations/create', [QuatationController::class, 'create'])->name('quatation.create');
// Route::get('/quatations/index', [QuatationController::class, 'index'])->name('quatation.index');
// Route::get('/quatations/create', [QuatationController::class, 'create'])->name('quatation.create');
// Route::post('/quatations/store', [QuatationController::class, 'store'])->name('quatation.store');
