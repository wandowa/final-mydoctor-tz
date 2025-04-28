<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    $about = \App\Models\About::first();
    $mission = \App\Models\Mission::first();
    $vision = \App\Models\Vision::first();
    $teamMembers = \App\Models\TeamMember::all();
    return view('about-us', compact('about', 'mission', 'vision', 'teamMembers'));
})->name('about-us');

Route::get('/services', function () {
    $serviceHeader = \App\Models\ServiceHeader::first();
    $services = \App\Models\Service::all();
    $portfolios = \App\Models\Portfolio::all();
    return view('services', compact('serviceHeader', 'services', 'portfolios'));
})->name('services');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/health-news', function () {
    return view('health-news');
})->name('health-news');

Route::get('/health-topics', function () {
    return view('health-topics');
})->name('health-topics');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Newsletter and Contact Routes
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking/process', [BookingController::class, 'processPayment'])->name('booking.process');
Route::get('/booking/success/{bookingId}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/cancel/{bookingId}', [BookingController::class, 'cancel'])->name('booking.cancel');