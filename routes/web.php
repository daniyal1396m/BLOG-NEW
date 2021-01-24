<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CallusController;
use App\Http\Controllers\NewsletterController;
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
/*
 * articles Routes
 */
Route::get('/', [ArticleController::class, 'index']);
Route::middleware('auth')->get('/form', [ArticleController::class, 'form']);
Route::post('/send/Article', [ArticleController::class, 'store'])->name('article.send');

/*
* contacts Routes
*
*/
Route::get('/contactus', [CallusController::class, 'index'])->name('contactUs');
Route::post('/sendContact', [CallusController::class, 'store'])->name('sendContactus');

/*
 * NewLetter Route
 *
 * */
Route::post('/Newsletter', [NewsletterController::class, 'store'])->name('storeNewsLetter');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
