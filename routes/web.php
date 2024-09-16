<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\TopicController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->controller(UserController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::get('users/{id}/edit', 'edit')->name('users.edit')->whereNumber('id');
    Route::put('users/{id}', 'update')->name('users.update');
});

Route::middleware(['auth'])->controller(CategoryController::class)->group(function () {
    Route::get('category', 'index')->name('category.index');
    Route::get('category/create', 'create')->name('category.create');
    Route::post('category', 'store')->name('category.store');
    Route::get('category/{id}/edit', 'edit')->name('category.edit')->whereNumber('id');
    Route::put('category/{id}', 'update')->name('category.update');
    Route::delete('category/{id}', 'destroy')->name('category.destroy');
});

Route::middleware(['auth'])->controller(TestimonialController::class)->group(function () {
    Route::get('testimonial', 'index')->name('testimonial.index');
    Route::get('testimonial/create', 'create')->name('testimonial.create');
    Route::post('testimonial', 'store')->name('testimonial.store');
    Route::get('testimonial/{id}/edit', 'edit')->name('testimonial.edit')->whereNumber('id');
    Route::put('testimonial/{id}', 'update')->name('testimonial.update');
    Route::delete('testimonial/{id}', 'destroy')->name('testimonial.destroy');
});

Route::middleware(['auth'])->controller(TopicController::class)->group(function () {
    Route::get('topics', 'index')->name('topics.index');
    Route::get('topics/create', 'create')->name('topics.create');
    Route::post('topics', 'store')->name('topics.store');
    Route::get('topics/details{id}', 'show')->name('topics.details');
    Route::get('topics/{id}/edit', 'edit')->name('topics.edit')->whereNumber('id');
    Route::put('topics/{id}', 'update')->name('topics.update');
    Route::delete('topics/{id}', 'destroy')->name('topics.destroy');
});

Route::middleware(['auth'])->controller(ContactController::class)->group(function () {
    Route::get('contact', 'index')->name('contact.index');
    Route::get('contact/details{id}', 'show')->name('contact.details');
    Route::delete('contact/{id}', 'destroy')->name('contact.destroy');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
