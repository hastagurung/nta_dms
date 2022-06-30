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

Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@loginAction');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('document_folders/delete/{id}','DocumentFolderController@delete')->name('document_folders.delete');
    Route::resource('document_folders','DocumentFolderController');
    Route::get('/','DocumentFolderController@index')->name('document_folders.index');
    Route::get('documents/list/{id}','DocumentsController@listByDocFolder')->name('documents.list');
    Route::get('documents/delete/{id}','DocumentsController@delete')->name('documents.delete');
    Route::resource('documents','DocumentsController');
    Route::resource('fiscal_years','FiscalYearController');

});
