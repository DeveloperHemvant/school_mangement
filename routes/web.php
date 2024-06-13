<?php

use App\Livewire\Admin\Allstaff;
use App\Livewire\Admin\Dahboard;
use App\Livewire\Classes\Classes;
// use App\Models\Subject;
use App\Livewire\Staff\StaffDashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Login;
use App\Livewire\Staff\Logins;
use App\Livewire\Parents\PLogin;
use App\Livewire\Student\Sloginn;
use App\Livewire\Permission\RoleManagement;
use App\Livewire\Permission\PermissionManagement;
use App\Livewire\Subject\Subject;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StaffMiddleware;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', login::class)->name('adminlogin');
Route::get('/staff/login', Logins::class)->name('stafflogin');
Route::get('/parent/login', PLogin::class)->name('parentlogin');
Route::get('/student/login', Sloginn::class)->name('studentlogin');



Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', Dahboard::class)->name('dashboard');
    Route::get('class', Classes::class)->name('class');
    Route::get('subject', Subject::class)->name('subject');
    Route::get('staff', Allstaff::class)->name('staff');
    Route::get('roles', RoleManagement::class)->name('roles');
    Route::get('permission', PermissionManagement::class)->name('permission');
});

// Route::get('staff/dashboard',StaffDashboard::class)->middleware(StaffMiddleware::class)->name('staffdashboard');




