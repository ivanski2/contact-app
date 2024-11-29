<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/contact', function () {
    return Inertia::render('ContactForm');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

