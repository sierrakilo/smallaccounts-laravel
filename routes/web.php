<?php

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
});

Route::get('nominal-accounts/trial-balance', 'NominalAccountsController@trialBalance')->name('nominal-accounts.trial-balance');
Route::get('nominal-accounts/{nominal_account}/activity', 'NominalAccountsController@activity')->name('nominal-accounts.activity');
Route::resource('nominal-accounts', 'NominalAccountsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
