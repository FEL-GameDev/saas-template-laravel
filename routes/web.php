<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInviteController;
use App\Http\Controllers\UserInvitedController;
use App\Http\Controllers\AccountController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('root');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)
    ->only(['index', 'edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('user_invites', UserInviteController::class)
    ->only(['create', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('roles', RoleController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('categories', CategoryController::class)
    ->only(['index', 'create', 'edit', 'update', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::controller(AccountController::class)
    ->group(function () {
        Route::get('/account', 'index')->name('account.index');
        Route::delete('/account', 'destroy')->name('account.destroy');
    })
    ->middleware(['auth', 'verified']);


Route::get('/register/invited/{inviteCode}', [UserInvitedController::class, 'invited'])->name('register.invited');
Route::get('/register/invited', [UserInvitedController::class, 'index'])->name('register.index');
Route::post('/register/invited/store', [UserInvitedController::class, 'store'])->name('register.acceptInvite');

require __DIR__ . '/auth.php';
