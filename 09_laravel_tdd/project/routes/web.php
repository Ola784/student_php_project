<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FinalGalleryController;

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
Route::get('/{url}.com', 'App\Http\Controllers\WebsiteController@index')->name('index');
Route::resource('/comments', App\Http\Controllers\CommentController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::resource('/{url}/admin',App\Http\Controllers\PageController::class
// )->middleware(['auth']);
require __DIR__.'/auth.php';
/*
Route::resource('/menus',App\Http\Controllers\MenuController::class)->middleware('auth');

Route::resource('pages.menus', App\Http\Controllers\PageMenuController::class);*/

//Route::resource('/pages', App\Http\Controllers\PageController::class);
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('', [App\Http\Controllers\PageController::class, 'index']);
    Route::resource('pages', App\Http\Controllers\PageController::class);
    Route::resource('pages.menus', App\Http\Controllers\PageMenuController::class,['only' => ['index','create','store','show','edit','destroy','update']]);

    Route::get('gallery', [GalleryController::class, 'index']);
    Route::post('gallery', [GalleryController::class, 'upload']);
    Route::delete('gallery/{id}', [GalleryController::class, 'destroy']);
});

// na finalnej stronie:
Route::get('gallery', [FinalGalleryController::class, 'index']);