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
use http\Env\Response;

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
/*
 *
 *
 * articles Routes
 *
 *
 */
Route::get('/', [ArticleController::class, 'index']);
Route::get('/article/single/{id}', [ArticleController::class, 'single']);
Route::middleware('auth')->get('/form', [ArticleController::class, 'form'])->name('form');
Route::post('/send/Article', [ArticleController::class, 'store'])->name('article.store');

/*
 *
 *
 * contacts Routes
 *
 *
 * */
Route::get('/contactus', [CallusController::class, 'index'])->name('contactUs');
Route::post('/sendMessage', [CallusController::class, 'store'])->name('store.Contactus');

/*
 *
 *
 * NewLetter Route
 *
 *
 * */
Route::post('/Newsletter', [NewsletterController::class, 'store'])->name('storeNewsLetter');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
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
//Route::post('/storeCategory',[CategoryController::class, 'store'])->name('store');
Route::post('/storeCategory', [CategoryController::class, 'store']);
Route::get('/res/callus/{id}', [CallusController::class, 'response']);
Route::get('/subcategory/{id}', [CategoryController::class, 'find']);
/*
 *
 *
 * edit delete categories
 *
 *
 * */
Route::post('/update/category', [CategoryController::class, 'delete'])->name('delete.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/edit/category', [CategoryController::class, 'storeEdit'])->name('store.category.edit');
/*
 *
 *
 * comments route
 *
 *
 * */
Route::post('/store/comment', [CommentController::class, 'store'])->name('store.comment');
