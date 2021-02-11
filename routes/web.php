<?php

use App\Http\Controllers\Private\CallusController;
use App\Http\Controllers\Private\CategoryController;
use App\Http\Controllers\Private\CommentPrivateController;
use App\Http\Controllers\Public\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Private\ArticleController;
use App\Http\Controllers\Public\ArticlePubController;
use App\Http\Controllers\Public\CallusPubController;
use App\Http\Controllers\Public\NewsletterController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::post('/storeCategory',[CategoryController::class, 'store'])->name('store');

Route::get('/', [ArticlePubController::class, 'index']);
Route::get('/article/single/{id}', [ArticlepubController::class, 'single'])->name('single.post');
/*
 *
 *
 * contacts Routes
 *
 *
 * */
Route::get('/contactus', [CallusPubController::class, 'index'])->name('contactUs');
Route::post('/sendMessage', [CallusPubController::class, 'store'])->name('store.Contactus');
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
 * comments route
 *
 *
 * */
Route::post('/store/comment', [CommentController::class, 'store'])->name('store.comment');
Route::post('/store/replay/comment', [CommentController::class, 'replay'])->name('store.replay');
/*
 *
 *
 * NewLetter Route
 *
 *
 * */
Route::post('/Newsletter', [NewsletterController::class, 'store'])->name('storeNewsLetter');
Route::get('/subcategory/{id}', [CategoryController::class, 'subcategory'])->name('subcategory');
Route::middleware('auth')->prefix('admin')->group(function () {
    /*
     *
     *
     * articles Routes
     *
     *
     */
    Route::get('/article', [ArticleController::class, 'ArtList'])->name('article.list');
    Route::get('/form', [ArticleController::class, 'form'])->name('article.form');
    Route::post('/delete/Article/{id}', [ArticleController::class, 'destroy'])->name('destroy.article');
    Route::get('/article/create', [ArticleController::class, 'index'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    /*
     *
     * CK - editor
     *
     * */

    Route::post('/article/ckeditor', [ArticleController::class, 'imageUpload'])->name('imageUpload');
    /*
     *
     * end CK - editor
     *
     * */
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::post('/store/edit/Article/{id}', [ArticleController::class, 'storeEdit'])->name('store.edit.article');
    /*
 *
 *
 * admin pages
 *
 *
 * */
    Route::get('/categoryList', [CategoryController::class, 'index'])->name('category');
    Route::get('/Newsletter/Lists', [ArticleController::class, 'NewsList'])->name('newsletter.list');
    Route::get('/Category/Lists', [CategoryController::class, 'CatList'])->name('category.list');
    Route::get('/Admin/Lists', [ArticleController::class, 'AdList'])->name('admins.list');
    Route::post('/delete/admin/{id}', [HomeController::class, 'destroy'])->name('destroy.user');
    Route::get('/Callus/Lists', [ArticleController::class, 'CallList'])->name('callus.list');

    /*
      *
      *
      *  categories  route
      *
      *
      * */
    Route::post('/update/category/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
    Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/category/edit', [CategoryController::class, 'storeEdit'])->name('store.category.edit');
    Route::post('/storeCategory', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/subcategory/{id}', [CategoryController::class, 'find']);

    /*
     *
     *
     * call us single message
     *
     * */
    Route::post('/res/callus/{id}', [CallusController::class, 'show'])->name('response.msg');
    Route::post('/send/res/callus', [CallusController::class, 'sendEmail'])->name('store.response.msg');
    /*
     *
     *
     * comments
     *
     * */
    Route::get('/update/comment/{id}', [CommentPrivateController::class, 'destroy'])->name('destroy.comment');
    Route::get('/list/comment', [CommentPrivateController::class, 'index'])->name('list.comment');
});


