<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware('auth')->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::resource('/groups', GroupController::class);
        Route::get('/groups/permission/{group}', [GroupController::class,'permission'])->name('groups.permission');
        Route::post('/groups/permission/{group}', [GroupController::class,'postPermission'])->name('groups.permission');

       Route::get('posts',[PostController::class,'index'])->name('posts.index')->can('viewAny',Post::class);
       Route::get('posts/create',[PostController::class,'create'])->name('posts.create')->can('create',Post::class);
       Route::post('posts',[PostController::class,'store'])->name('posts.store');
       Route::get('posts/{post}/edit',[PostController::class,'edit'])->can('posts.edit')->name('posts.edit');
       Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
       Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');
    });