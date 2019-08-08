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

/* @see HomeController::index() */
Route::get('/', 'HomeController@index')->name('home');

/* @see AboutController::index() */
Route::get('/about', 'AboutController@index')->name('about');

/* @see ContactUsController::index() */
Route::get('/contact-us', 'ContactUsController@index')->name('contact-us');

/* @see PrivacyPolicyController::index() */
Route::get('/privacy-policy', 'PrivacyPolicyController@index')->name('privacy-policy');


Route::middleware('auth')->group(function () {

    /* @see MeasurementController::index() */
    Route::get('/dashboard', 'MeasurementController@index')->name('dashboard');

    /* @see ProfileController::index() */
    Route::get('/profile', 'ProfileController@index')->name('profile');

    /* @see MeasurementController::store() */
    Route::post('/measurements', 'MeasurementController@store');
});

