<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function(){
    return 'this is my page';
});



//Route::group(['namespace' => 'Post'], function () {
//    Route::get('/posts', [\App\Http\Controllers\Post\IndexController::class])->name('post.index');
//    Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class])->name('post.create');
//    Route::post('/posts', [\App\Http\Controllers\Post\StoreController::class])->name('post.store');
//    Route::get('/posts/{post}', [\App\Http\Controllers\Post\ShowController::class])->name('post.show');
//    Route::get('/posts/{post}/edit', [\App\Http\Controllers\Post\EditController::class])->name('post.edit');
//    Route::patch('/posts/{post}', [\App\Http\Controllers\Post\UpdateController::class])->name('post.update');
//    Route::delete('/posts/{post}', [\App\Http\Controllers\Post\DestroyController::class])->name('post.delete');
//});

    Route::get('/posts', [\App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('post.index');
    Route::get('/posts/create', [\App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('post.create');
    Route::post('/posts', [\App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('post.store');
    Route::get('/posts/{post}', [\App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('post.show');
    Route::get('/posts/{post}/edit', [\App\Http\Controllers\Post\EditController::class, '__invoke'])->name('post.edit');
    Route::patch('/posts/{post}', [\App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('post.update');
    Route::delete('/posts/{post}', [\App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('post.delete');
//Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
//Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
//Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
//Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
//Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
//Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
//Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');





Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/restore', [\App\Http\Controllers\PostController::class, 'restore']);
Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);




//Route::get(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
//    Route::get('/Admin', [\App\Http\Controllers\IndexController::class, '__invoke'])->name('Admin.index');
//    Route::get(['namespace' => 'Post'], function(){
//        Route::get('/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');
//    });
//});

Route::get('admin/post', [\App\Http\Controllers\Admin\Post\IndexController::class, '__invoke'])->name('admin.post.index');


Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');
