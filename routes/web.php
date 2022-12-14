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

Route::get('/Login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/home', function () {
    return view('layouts.home');
})->name('home');

Route::get('/locataire', function () {
    return view('pages.locataires');
})->name('Locataires');

Route::get('/AjoutLocataire', function () {
    return view('pages.locataireform');
})->name('Locataire_Form');
