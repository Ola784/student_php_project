<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FinalGalleryController;
use App\Http\Controllers\PageGalleryController;
use App\Http\Controllers\GalleryImageController;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\FinalPageController;
use App\Http\Controllers\FinalPageGalleryController;
use App\Http\Controllers\FinalGalleryImageController;

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

Route::resource('/comments', App\Http\Controllers\CommentController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
/*
Route::resource('/menus',App\Http\Controllers\MenuController::class)->middleware('auth');
Route::resource('pages.menus', App\Http\Controllers\PageMenuController::class);*/
//Route::resource('/pages', App\Http\Controllers\PageController::class);


// admin:
Route::resource('{url}.com/admin/pages', App\Http\Controllers\PageController::class);
Route::get('{url}.com/admin', [App\Http\Controllers\PageController::class, 'index']);
Route::resource('{url}.com/admin/pages.menus', App\Http\Controllers\PageMenuController::class,['only' => ['index','create','store','show','edit','destroy','update']]);

Route::resource('{url}.com/admin/pages.galleries', PageGalleryController::class);
Route::resource('{url}.com/admin/pages.galleries.images', GalleryImageController::class,['only' => ['index','create','store','show','edit','destroy','update']]);

Route::resource('{url}.com/admin/pages.posts', App\Http\Controllers\PagePostController::class,['only' => ['index','create','store','show','edit','destroy','update']]);


Route::get('/contact', [App\Http\Controllers\EmailController::class, 'index']);
Route::post('/sendemail/send', [App\Http\Controllers\EmailController::class, 'send']);

// finalna strona:
<<<<<<< HEAD
Route::get('/{url}.com', 'App\Http\Controllers\WebsiteController@index')->name('index');
//Route::get('/{url}.com', 'App\Http\Controllers\WebsiteController@show')->name('website');
Route::resource('/{url}.com/pages', WebsiteController::class, ['only' => ['index','show']])->names([
=======
//Route::get('/{url}.com', 'App\Http\Controllers\WebsiteController@index')->name('index');
Route::get('/{url}.com', 'App\Http\Controllers\WebsiteController@show')->name('website');
Route::resource('/{url}.com/page', WebsiteController::class, ['only' => ['index','show']])->names([
>>>>>>> 0fbafa1ccd02890e588f3f5bd2ad44dd8e2e6faa
    'index' => 'website',
    'show' => 'website.show'
]);
Route::resource('{url}.com/pages.galleries', FinalPageGalleryController::class, ['only' => ['show']])->names([
    'show' => 'final.pages.galleries.show'
]);
Route::resource('{url}.com/pages.galleries.images', FinalGalleryImageController::class, ['only' => ['show']])->names([
    'show' => 'final.pages.galleries.images.show'
]);



