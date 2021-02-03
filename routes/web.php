<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CallusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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

Route::get('/', [ArticleController::class, 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Route::post('/storeCategory',[CategoryController::class, 'store'])->name('store');


Route::middleware('auth')->prefix('admin')->group(function () {
    /*
     *
     *
     * articles Routes
     *
     *
     */
    Route::get('/update/Article/{id}', [ArticleController::class, 'update'])->name('update.article');
    Route::get('/form', [ArticleController::class, 'form'])->name('form');
    Route::post('/send/Article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit/Article/{id}', [ArticleController::class, 'edit'])->name('edit.article');
    Route::post('/store/edit/Article/{id}', [ArticleController::class, 'storeEdit'])->name('store.edit.article');
    /*
 *
 *
 * admin pages
 *
 *
 * */
    Route::get('/categoryList', [CategoryController::class, 'index'])->name('category');
    Route::get('/Articles/Lists', [ArticleController::class, 'ArtList'])->name('article.list');
    Route::get('/Newsletter/Lists', [ArticleController::class, 'NewsList'])->name('newsletter.list');
    Route::get('/Category/Lists', [ArticleController::class, 'CatList'])->name('category.list');
    Route::get('/Ad/Lists', [ArticleController::class, 'AdList'])->name('admins.list');
    Route::get('/Callus/Lists', [ArticleController::class, 'CallList'])->name('callus.list');

    /*
      *
      *
      *  categories  route
      *
      *
      * */
    Route::get('/update/category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/edit/category', [CategoryController::class, 'storeEdit'])->name('store.category.edit');
    Route::post('/storeCategory', [CategoryController::class, 'store']);
    Route::get('/subcategory/{id}', [CategoryController::class, 'find']);

    /*
     *
     *
     * call us single message
     *
     * */
    Route::get('/res/callus/{id}', [CallusController::class, 'response']);

});
/*
 *
 *
 * for get sub cat Jquery v1.1
 *
 *
 * */
Route::get('/getCatSub/{cat_id}', [CategoryController::class, 'check'])->name('getCatSub');
/*
 *
 *
 * end get sub cat Jquery v1.1
 *
 *
 * */
/*
 *
 *
 * comments route
 *
 *
 * */
Route::post('/store/comment/{slug}', [CommentController::class, 'store'])->name('store.comment');
/*
 *
 *
 * NewLetter Route
 *
 *
 * */
Route::post('/Newsletter', [NewsletterController::class, 'store'])->name('storeNewsLetter');
/*
 *
 *
 * contacts Routes
 *
 *
 * */
Route::get('/contactus', [CallusController::class, 'index'])->name('contactUs');
Route::post('/sendMessage', [CallusController::class, 'store'])->name('store.Contactus');
Route::get('/article/single/{id}', [ArticleController::class, 'single']);


