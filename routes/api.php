<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DniController;

Route::post('/calculate-dni-letter', [DniController::class, 'calculateLetter']);