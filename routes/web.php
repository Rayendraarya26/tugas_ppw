<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/halo/{nama?}', function ($nama = 'captain') {
    return '<h1>Ahoy '. $nama . '!</h1>';
});

Route::get('/halo-dunia', function () {
    return view('halo-dunia', ['data' => 'Test Data']);
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/education', function () {
    return view('education');
});

Route::resource('posts',
'App\Http\Controllers\PostController');

Auth::Routes([
    'reset' => false,
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');