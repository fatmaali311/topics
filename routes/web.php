<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('index', 'index')->name('topic.index');
    Route::get('testimonials', 'testimonial')->name('testimonial');
    Route::get('topics-listing', 'topicListing')->name('topicListing');
    Route::get('topics-details{id}', 'show')->name('topicDetails');
    Route::get('increase-views/{id}', 'increaceViews')->name('increaceViews');
    Route::get('contactus', 'contact')->name('contactus');
    Route::post('contact', 'store')->name('contact.store');

});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/admin.php';
