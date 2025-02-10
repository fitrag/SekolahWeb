<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AnnouncementComponent;
use App\Livewire\{LoginComponent, RegisterComponent, DashboardComponent, Settings, BannerSlider, BannersIndexComponent, BannersCreateComponent, ArticlesIndexComponent, ArticlesCreateComponent, ArticlesEditComponent};  
use App\Http\Controllers\IndexController;  
use App\Http\Controllers\ArticleController;

Route::get('/login', LoginComponent::class)->name('login');
Route::get('/register', RegisterComponent::class)->name('register');
Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
Route::get('/settings', Settings::class)->name('settings');
Route::get('/banners', BannersIndexComponent::class)->name('banners');
Route::get('/banners/create', BannersCreateComponent::class)->name('banners.create');
Route::get('/articles', ArticlesIndexComponent::class)->name('articles');
Route::get('/articles/create', ArticlesCreateComponent::class)->name('articles.create');
Route::get('/articles/edit/{id}', ArticlesEditComponent::class)->name('articles.edit');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');