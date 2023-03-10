<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


// Listings
Route::get('/', [ListingController::class, 'index']); // All Listings
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth'); // Show Create Form page
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth'); // Store Listing (Create)
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth'); // Show Edit Form page
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth'); // Update Listing (Edit)
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth'); // Update Listing (Edit)
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth'); // Show Listing Page
Route::get('/listings/{listing}', [ListingController::class, 'show']); // Show Single Listing page
Route::get('/register', [UserController::class, 'create'])->middleware('guest'); // Show register page
Route::post('/users', [UserController::class, 'store']); // Create new user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // Logout user
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); // Show login form page
Route::post('/users/authenticate', [UserController::class, 'authenticate']); // Login user