<?php

use App\Livewire\Admin\Allstaff;
use App\Livewire\Admin\Dahboard;
use App\Livewire\Classes\Classes;
// use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Login;
use App\Livewire\Staff\Logins;
use App\Livewire\Parents\PLogin;
use App\Livewire\Student\Sloginn;
use App\Livewire\Permission\RoleManagement;
use App\Livewire\Permission\PermissionManagement;
use App\Livewire\Subject\Subject;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', login::class)->name('adminlogin');
Route::get('/staff/login', Logins::class)->name('stafflogin');
Route::get('/parent/login', PLogin::class)->name('parentlogin');
Route::get('/student/login', Sloginn::class)->name('studentlogin');

Route::get('admin/dashboard',Dahboard::class)->middleware(AdminMiddleware::class)->name('admindashboard');
Route::get('admin/class',Classes::class)->middleware(AdminMiddleware::class)->name('class');
Route::get('admin/subject',Subject::class)->middleware(AdminMiddleware::class)->name('subject');
Route::get('admin/staff',Allstaff::class)->middleware(AdminMiddleware::class)->name('staff');
Route::get('admin/roles',RoleManagement::class)->middleware(AdminMiddleware::class)->name('roles');
Route::get('admin/permission',PermissionManagement::class)->middleware(AdminMiddleware::class)->name('permission');






