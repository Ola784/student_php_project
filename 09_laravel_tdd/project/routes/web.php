<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FinalGalleryController;
use App\Http\Controllers\PageGalleryController;
use App\Http\Controllers\GalleryImageController;

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

require __DIR__.'/auth.php';
/*
Route::resource('/menus',App\Http\Controllers\MenuController::class)->middleware('auth');
Route::resource('pages.menus', App\Http\Controllers\PageMenuController::class);*/
//Route::resource('/pages', App\Http\Controllers\PageController::class);


//admin:
Route::resource('{url}.com/admin/pages', App\Http\Controllers\PageController::class);
Route::get('{url}.com/admin', [App\Http\Controllers\PageController::class, 'index']);
Route::resource('{url}.com/admin/pages.menus', App\Http\Controllers\PageMenuController::class,['only' => ['index','create','store','show','edit','destroy','update']]);

Route::resource('{url}.com/admin/pages.galleries', PageGalleryController::class);
Route::resource('{url}.com/admin/pages.galleries.images', GalleryImageController::class,['only' => ['index','create','store','show','edit','destroy','update']]);


Route::get('/contact', [App\Http\Controllers\EmailController::class, 'index']);
Route::post('/sendemail/send', [App\Http\Controllers\EmailController::class, 'send']);

//Route::get('{url}.com/admin/gallery', [GalleryController::class, 'index'])->name('gallery.index');
//Route::post('{url}.com/admin/gallery', [GalleryController::class, 'upload'])->name('gallery.upload');
//Route::delete('{url}.com/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');


// finalna strona:
//Route::get('{url}.com/gallery', [FinalGalleryController::class, 'index']);
