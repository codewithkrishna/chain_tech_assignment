<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user_login');
    // return view('admin.layout');
});
Route::get('/signup', function () {
    return view('signup');
});

Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin.auth');
Route::get('/admin',[AdminController::class,'index']);

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('/admin/userslist',[UsersController::class,'index']);
    Route::get('/admin/userslist/delete/{id}',[UsersController::class,'delete']);
    Route::get('/admin/userslist/status/{status}/{id}',[UsersController::class,'status']);




    Route::get('/admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        session()->flash('error','Logout Successfully');
        return redirect('/admin');
    });
});



Route::post('/user_register',[UsersController::class,'insert'])->name('user.insert');

Route::post('/user/auth',[UsersController::class,'auth'])->name('user.auth');

Route::group(['middleware'=>'user_auth'],function(){
    Route::get('/user/dashboard',[UsersController::class,'dashboard']);
    Route::get('/user/edit/{id}',[UsersController::class,'edit']);

    Route::post('/user/update',[UsersController::class,'update'])->name('user.update');
    Route::get('/user/logout', function () {
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->forget('USER_NAME');
        session()->flash('error','Logout Successfully');
        return redirect('/');
    });

});