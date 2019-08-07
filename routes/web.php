<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@index');

    /* @see MeasurementController::index() */
    Route::get('/dashboard', 'MeasurementController@index')->name('dashboard');

    /* @see MeasurementController::store() */
    Route::post('/measurements', 'MeasurementController@store');
});

