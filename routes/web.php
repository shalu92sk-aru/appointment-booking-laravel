<?php
use Illuminate\\Support\\Facades\\Route;
use App\\Http\\Controllers\\BookingController;
use App\\Http\\Controllers\\AdminController;
Route::get('/',[BookingController::class,'index'])->name('home');
Route::post('/book',[BookingController::class,'store'])->name('booking.store');
Route::get('/booking/{appointment}/success',[BookingController::class,'success'])->name('booking.success');
Route::prefix('admin')->name('admin.')->group(function(){
 Route::middleware('guest')->group(function(){Route::get('/login',[AdminController::class,'loginForm'])->name('login');Route::post('/login',[AdminController::class,'login'])->name('login.submit');});
 Route::middleware('auth')->group(function(){Route::get('/',[AdminController::class,'dashboard'])->name('dashboard');Route::post('/logout',[AdminController::class,'logout'])->name('logout');Route::patch('/appointments/{appointment}/status',[AdminController::class,'status'])->name('status');Route::get('/services',[AdminController::class,'services'])->name('services');Route::post('/services',[AdminController::class,'addService'])->name('services.add');Route::patch('/services/{service}/toggle',[AdminController::class,'toggle'])->name('services.toggle');});
});
