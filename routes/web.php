<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;

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

// Route::get('/', [LoginController::class, 'index'])->middleware('guest');

Route::get('/home', function() {
    return view('home', [
        'title' => 'home',
        // 'countCustomer' => DB::table('customers')->count(),
        'countCustomer' => DB::table('customers')->where('status', true)->count(),
        'countTagihan' => DB::table('transactions')->where('has_paid', false)->count(),
        'countUsage' => DB::table('customers')->where('meter_air', 0)->count()
    ]);
})->middleware('auth');

// Route::get('/bayar', function() {
//     return view('bayar', [
//         'title' => 'bayar'
//     ]);
// });

// Route::get('/menu', function() {
//     return view('menu', [
//         'title' => 'menu'
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/categories', CategoryController::class)->middleware('superadmin');

// Route::resource('/customers', CustomerController::class);
Route::post('/customers/{customer}/remove', [CustomerController::class, 'remove'])->middleware('superadmin');
Route::resource('/customers', CustomerController::class)->middleware('superadmin');

// Route::resource('/users', UserController::class);
Route::resource('/users', UserController::class)->middleware('superadmin');

Route::resource('/penalties', PenaltyController::class)->middleware('superadmin');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/sidebar', function() {
//     return view('layouts.sidebar', [
//         'title' => 'sidebar'
//     ]);
// });

// Route::get('/dashboard', function() {
//     return view('layouts.dashboard');
// });

// Route::get('/main', function() {
//     return view('layouts.mainn');
// });

Route::get('/petugas', [PetugasController::class, 'index'])->middleware('superadmin');
// Route::get('/petugas/create', [PetugasController::class, 'create']);
// Route::put('/petugas/{user}', [PetugasController::class, 'addRemove']);

Route::get('/admins', [AdminController::class, 'index'])->middleware('superadmin');
// Route::get('/admins/create', [AdminController::class, 'create']);
// Route::put('/admins/{user}', [AdminController::class, 'addRemove']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->middleware('auth');

// Route::resource('/usages', UsageController::class)->middleware('auth');
Route::get('/usages', [UsageController::class, 'index'])->middleware('superadmin');
Route::get('/usages/check', [UsageController::class, 'check'])->middleware('petugas');
Route::get('/usages/create', [UsageController::class, 'create'])->middleware('petugas');
Route::get('/usages/{usage:customer_id}', [UsageController::class, 'show'])->middleware('petugas');
Route::post('/usages', [UsageController::class, 'store'])->middleware('petugas');
Route::get('/usages/{usage}/edit', [UsageController::class, 'edit'])->middleware('petugas');
Route::put('/usages/{usage}', [UsageController::class, 'update'])->middleware('petugas');
// Route::get('/usages/{usage}', [UsageController::class, 'show']);
// Route::post('/usages/{usage}', [UsageController::class, 'store']);

Route::get('/transactions/histories', [TransactionController::class, 'history'])->middleware('superadmin');
Route::resource('/transactions', TransactionController::class)->middleware('superadmin');

Route::get('/payments/check', [PaymentController::class, 'check'])->middleware('admin');
Route::get('/payments/bayar', [PaymentController::class, 'bayar'])->middleware('admin');
Route::post('/payments', [PaymentController::class, 'store'])->middleware('admin');
Route::get('/payments/{payment:customer_id}', [PaymentController::class, 'show'])->middleware('admin');
Route::get('/payments', [PaymentController::class, 'index'])->middleware('superadmin');
Route::get('/payments/{payment}/print', [PaymentController::class, 'print']);

Route::get('/main', function(){
    return view('layouts.mainn');
});