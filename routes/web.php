<?php

use Illuminate\Support\Facades\Route;
use App\Models\Legislation;
use Illuminate\Http\Request;
use App\Http\Controllers\LegislationController;
use App\Http\Controllers\LegislatorController;

//Inertia routes
Route::inertia('/', 'Welcome')->name('home');
Route::inertia('/legislators', 'LegislatorList')->name('legislatorList');
Route::inertia('/legislators/create', 'LegislatorForm')->name('legislatorCreate');
Route::inertia('/legislations', 'LegislationList')->name('legislationList');
Route::inertia('/legislations/create', 'LegislationForm')->name('legislationCreate');

//API routes
Route::post('/api/legislations', [LegislationController::class, 'create']);
Route::get('/api/legislations', [LegislationController::class, 'get']);
Route::post('/api/legislators', [LegislatorController::class, 'create']);
Route::get('/api/legislators', [LegislatorController::class, 'get']); 
