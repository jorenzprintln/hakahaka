<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResortController;

Route::get('/', [ResortController::class, 'showPortRoyale'])->name('portroyale');