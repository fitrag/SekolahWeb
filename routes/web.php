<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AnnouncementComponent;
use App\Livewire\{LoginComponent, RegisterComponent, DashboardComponent, Settings};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login', LoginComponent::class)->name('login');
Route::get('/register', RegisterComponent::class)->name('register');
Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
Route::get('/settings', Settings::class)->name('settings');