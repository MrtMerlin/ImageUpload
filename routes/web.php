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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('index');
Route::get('/about', 'App\Http\Controllers\WelcomeController@about')->name('about');

Auth::routes();

Route::get('/sign_in', 'App\Http\Controllers\HomeController@sign_in')->name('sign_in');

Route::get('/create', 'App\Http\Controllers\ImageController@create')->name('create');
Route::get('/view/{image}', 'App\Http\Controllers\ImageController@view')->name('view');
Route::get('/update/{image}', 'App\Http\Controllers\ImageController@update')->name('update');
Route::get('/delete/{image}', 'App\Http\Controllers\ImageController@delete')->name('delete');

Route::post('/save/{image?}', 'App\Http\Controllers\ImageController@save')->name('save');

Route::post('/makeVote/', 'App\Http\Controllers\VoteController@makeVote')->name('makeVote');
