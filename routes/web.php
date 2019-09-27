<?php

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

Route::get('/', 'HomeController@index')->name('welcome');


Route::group(['middleware' => 'auth'], function (){

    $eventsController = "\App\Modules\Event\Http\Controllers\EventsController";

    Route::get('events', "{$eventsController}@index")->name('events');
    Route::get('events/add', "{$eventsController}@add")->name('event-add');
    Route::post('events/save', "{$eventsController}@store")->name('event-save');
    Route::get('events/view/{event}', "{$eventsController}@view")->name('event-view');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
