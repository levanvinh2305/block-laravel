<?php

use Illuminate\Support\Facades\Route;
//
use App\Http\Controllers\CategoryController;
//
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Role;
use App\Models\Permission;

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



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::prefix('user')->group(function () {
        //lấy dữ liệu ra user_list
        Route::get('/',[UserController::class,'user_index'])->name('user_list');
        //lấy dữ liệu ra từ user_add select
        Route::get('/create',[UserController::class,'create'])->name('post_add');
        //nhập vào dữ liệu data
        Route::post('/create/add',[UserController::class,'store'])->name('users_add'); // Vị trí sai 1
        //sửa dữ liệu
        Route::get('/create/{id}',[UserController::class,'user_show_edit'])->name('show_edit_user');
        Route::put('/create/{id}',[UserController::class,'edit_user'])->name('user_edits');
        //xoa
        // Route::get('/create/{id}',[UserController::class,'delete_user'])->name('show_delete_user');
        Route::delete('/create/{id}',[UserController::class,'delete'])->name('user_delete');
    });

    Route::prefix('post')->group(function () {
        //lấy dữ liệu ra user_list
        Route::get('/',[RoleController::class,'user_index'])->name('role_list');
        //lấy dữ liệu ra từ user_add select
        Route::get('/role',[RoleController::class,'create'])->name('role_add');
        //nhập vào dữ liệu data
        Route::post('/role/add',[RoleController::class,'store'])->name('create_add'); // Vị trí sai 2
        //sửa dữ liệu
        Route::get('/role/{id}',[RoleController::class,'user_show_edit'])->name('show_edit_role');
        Route::put('/role/{id}',[RoleController::class,'edit_user'])->name('role_edits');
        //xoa
        Route::delete('/role/{id}',[RoleController::class,'delete'])->name('role_delete');
    });


    //them trong category
    Route::get('/danhmuc',[CategoryController::class,'index_add'])->name('category_list');
    Route::post('/danhmuc',[CategoryController::class,'store_add'])->name('category-post');
    //add trong category
    Route::get('/danhmuc/them', function () {
        return view('category.category_add');
    })->name('category_add');
    //sua trong category
    Route::get('/danhmuc/{id}',[CategoryController::class,'show'])->name('category_edit_form');
    Route::put('/danhmuc/{id}',[CategoryController::class,'edit_list'])->name('category_edits');
    //xoa trong category
    Route::delete('/danhmuc/{id}',[CategoryController::class,'Xoa'])->name('category_delete');

