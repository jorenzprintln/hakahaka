<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResortController;

Route::get('/', [ResortController::class, 'showPortRoyale'])->name('portroyale');
// routes/web.php
Route::post('/summarize-reviews', [ResortController::class, 'summarizeReviews'])->name('summarize.reviews');
