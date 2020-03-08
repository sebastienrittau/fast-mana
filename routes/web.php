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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    //Collection Routes
        Route::get('collection/cards/add', 'CollectionController@indexCardsAdd')->name('collection.cards.add');
        Route::get('collection/cards/show', 'CollectionController@indexCardsShow')->name('collection.cards.show');
        Route::post('collection/cards/add', 'CollectionController@addCard');
        Route::put('collection/cards/add', 'CollectionController@addCard');
        Route::post('collection/cards/show', 'CollectionController@getUserCards');
        Route::delete('collection/cards/show/delete', 'CollectionController@deleteCard');
        Route::post('collection/cards/add/search', 'CollectionController@addCardsSearch');
});
