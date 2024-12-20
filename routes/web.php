<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AreaChartController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\hsi2023Controller;
use App\Http\Controllers\CsvUploadController;
use App\Http\Controllers\JsonUploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth', 'cekRole:admin,viewer,helpdesk'], function () {
    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/area-chart', [AreaChartController::class, 'areaChart']);
	Route::get('/profile', [DataUserController::class, 'index'])->name('profile');
	Route::get('/tambahuser', [DataUserController::class, 'tambahuser'])->name('tambahuser');
	Route::post('/insertuser', [DataUserController::class, 'insertuser'])->name('insertuser');
	Route::delete('/deleteuser/{id}', [DataUserController::class, 'deleteuser'])->name('deleteuser');
	Route::get('/user-teams', [DataUserController::class, 'getTeams'])->name('user.teams');
	Route::post('/upload-csv', [CsvUploadController::class, 'upload'])->name('upload.csv');
	Route::post('/upload-csv-dashboard', [CsvUploadController::class, 'uploadDashboard'])->name('upload.dashboard.csv');
	Route::post('/upload-json', [JsonUploadController::class, 'upload'])->name('upload.json');
	Route::post('/upload-dashboard', [JsonUploadController::class, 'uploadDashboard']);

	Route::get('/chart-data', [ChartController::class, 'getData']);
	Route::get('/dashboard', [hsi2023Controller::class, 'index'])->name('dashboard');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');