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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('/top','VoicematchController',['only' => ['show','index']])->name('top','top');
// Route::get('top','VoicematchController@index')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/analyze', 'VoicematchController@analyze')->name('analyze');
Route::get('/analyze2', 'VoicematchController@analyze2')->name('analyze2');

Route::get('/explain', 'VoicematchController@explain')->name('explain');

Route::get('/explain2', 'VoicematchController@explain2')->name('explain2');

Route::get('/match/{id}', 'VoicematchController@match')->name('match');
