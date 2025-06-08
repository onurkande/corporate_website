<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\BlogController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dynamic.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/blogs', function () {
    return view('blogs');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/service',[ServiceDetailController::class, 'view']);

// Route::get('/service', function () {
//     return view('service');
// });

Route::get('/project', function () {
    return view('project');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/dynamic', function () {
    return view('layouts.dynamic');
});

Route::get('/deneme', function () {
    return view('dynamic.deneme');
});

Route::get('test',function (){
    return public_path('');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
