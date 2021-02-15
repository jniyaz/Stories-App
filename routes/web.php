<?php

use App\Http\Middleware\CheckAdmin;
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
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'DashboardController@index')->name('dashboard.index');
Route::get('/stories/{story:slug}', 'DashboardController@show')->name('dashboard.show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('story', 'StoryController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', CheckAdmin::class]], function () {
    Route::get('deleted-stories', 'StoriesController@index')->name('admin.story.index');
});