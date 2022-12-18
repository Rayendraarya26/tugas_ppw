<?php

use App\Models\Post;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendEmailController;
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
    return view('home');
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

Route::get('/galeri', function () {
    return view('galeri');
});

Route::resource('posts','App\Http\Controllers\PostController');

Auth::Routes([
    'reset' => false,
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

// Route::get('/send-email',function(){
//     $data = [
//     'name' => 'Nama Anda',
//     'body' => 'Testing Kirim Email'
//     ];
   
//     Mail::to('rayendraarya7@gmail.com')->send(new SendEmail($data));
   
//     dd("Email Berhasil dikirim.");
//    });

Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
});

