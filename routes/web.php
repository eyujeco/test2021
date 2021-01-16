<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ForumController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'home']);

Route::view('newpost','pages.newpost');
// Route::get('/newpost',[ForumController::class,'show']);
Route::post('newpost',[ForumController::class,'newPost']);
Route::get('postdetail/{slug}',[ForumController::class,'viewPost'])->name('view_post');
Route::delete('newpost',[ForumController::class,'deletePost'])->name('delete_post');

Route::post('reply',[ForumController::class,'saveReply'])->name('save_reply');
Route::delete('reply',[ForumController::class,'deleteReply'])->name('delete_reply');

Route::get('{id}/edit',[ForumController::class,'getEditPost'])->name('get_edit_post');
Route::post('edit',[ForumController::class,'saveEditPost'])->name('edit_post');

