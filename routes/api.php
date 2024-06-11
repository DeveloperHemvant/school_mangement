<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Livewire\Parents\PLogin;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/parent/login', [PLogin::class, 'loginuser'])->name('apiparentlogin'); 