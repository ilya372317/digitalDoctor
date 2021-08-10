<?php

use App\Models\BlogPostModels;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/admin', 'namespace' => '\App\Http\Controllers\admin\\'],function(){
    Route::get('', 'BlogAdminController@viewAdmin')->name('admin.blog.index')->middleware('can:viewAny,'. BlogPostModels::class);
});


Route::group(['namespace' => '\App\Http\Controllers\admin\blog\\', 'prefix' => 'admin/blog'],function (){
    Route::resource('categories', 'BlogCategoryController')->except('show')->names('admin.blog.category');
    Route::resource('posts','BlogPostController')->names('admin.blog.post')->middleware('can:viewAny,'. BlogPostModels::class);
    Route::get('categories/{category:slug}','BlogCategoryController@restore')->name('admin.blog.category.restore');
    Route::get('posts/{post}', 'BlogPostController@restore')->name('blog.admin.posts.restore');
    Route::get('posts/deleteThumbnail/{post}', 'BlogPostController@deleteThumbnail')->name('admin.blog.post.deleteThumbnail');
});


Route::group(['namespace' => '\App\Http\Controllers\blog\posts\\', 'prefix' => ''], function(){
    Route::get('posts', 'PostController@archivhePost' )->name('blog.posts.archive');
    Route::get('posts/{slug}', 'PostController@singlePost')->name('blog.post.single');
});


