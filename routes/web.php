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

// Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);

});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/', 'VitaminController@index')->name('index');

Route::get('/{slug}', 'VitaminController@show')->name('show-vitamin');

Route::middleware('can:delete-users')->group(function(){
    Route::resource('vitamins', 'VitaminController', ['except' => ['show']]);
    Route::get('/{slug}/edit', 'VitaminController@edit');
});

Route::get('/live_search/action', 'VitaminController@action')->name('live_search.action');


Route::get("/izjava/izjava-o-odricanju-odgovornosti", function(){
    return View::make("staticpages.izjava");
 })->name('izjava.odricanje.odgovornosti');

 Route::get("/declaration/disclaimer-of-liability", function(){
    return View::make("staticpages.enizjava");
 })->name('en.izjava.odricanje.odgovornosti');;
