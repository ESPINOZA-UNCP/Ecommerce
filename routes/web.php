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

Route::get('/', function () { 
    return view('/aloja/index');
});

Route::view('/a_about', '/aloja/about');
Route::view('/a_blog', '/aloja/blog');
Route::view('/a_contact', '/aloja/contact');
Route::view('/a_elements', '/aloja/elements');
Route::view('/a_index', '/aloja/index');
Route::view('/a_offers', '/aloja/offers');
Route::view('/a_single_listing', '/aloja/listings/single_listing');
Route::view('/listing/1', '/aloja/listings/1');
Route::view('/listing/2', '/aloja/listings/2');
Route::view('/listing/3', '/aloja/listings/3');
Route::view('/listing/4', '/aloja/listings/4');
Route::view('/listing/5', '/aloja/listings/5');
Route::view('/listing/6', '/aloja/listings/6');
Route::view('/listing/7', '/aloja/listings/7');
Route::view('/listing/8', '/aloja/listings/8');
Route::view('/listing/9', '/aloja/listings/9');
Route::view('/listing/10', '/aloja/listings/10');
Route::view('/listing/11', '/aloja/listings/11');
Route::view('/listing/12', '/aloja/listings/12');
Route::view('/listing/13', '/aloja/listings/13');
Route::view('/listing/14', '/aloja/listings/14');
Route::view('/listing/15', '/aloja/listings/15');
Route::view('/listing/16', '/aloja/listings/16');
Route::view('/listing/17', '/aloja/listings/17');
Route::view('/listing/18', '/aloja/listings/18');
Route::view('/listing/19', '/aloja/listings/19');
Route::view('/listing/20', '/aloja/listings/20');
Route::view('/listing/21', '/aloja/listings/21');
Route::view('/listing/22', '/aloja/listings/22');
Route::view('/listing/23', '/aloja/listings/23');
Route::view('/listing/24', '/aloja/listings/24');
Route::view('/listing/25', '/aloja/listings/25');
Route::view('/listing/26', '/aloja/listings/26');
Route::view('/listing/27', '/aloja/listings/27');
Route::view('/listing/28', '/aloja/listings/28');
Route::view('/listing/29', '/aloja/listings/29');
Route::view('/listing/30', '/aloja/listings/30');
Route::view('/listing/31', '/aloja/listings/31');

Route::view('/t_confirmacion', '/teleticket/confirmacion');
Route::view('/t_envio', '/teleticket/envio');
Route::view('/t_index', '/teleticket/index');
Route::view('/t_pago_americanexpress', '/teleticket/pago_americanexpress');
Route::view('/t_pago_billeteraelectronica', '/teleticket/pago_billeteraelectronica');
Route::view('/t_pago_dinersclub', '/teleticket/pago_dinersclub');
Route::view('/t_pago_fpay', '/teleticket/pago_fpay');
Route::view('/t_pago_mastercard', '/teleticket/pago_mastercard');
Route::view('/t_pago_visa', '/teleticket/pago_visa');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::resource('interfaz/venta','App\Http\Controllers\VentaController');
	Route::resource('interfaz/paquete','App\Http\Controllers\PaqueteController');
	Route::resource('interfaz/categoria','App\Http\Controllers\CategoriaController');
	Route::resource('interfaz/itinerario','App\Http\Controllers\ItinerarioController');
	Route::resource('interfaz/pago','App\Http\Controllers\PagoController');
	Route::resource('interfaz/lugarturistico','App\Http\Controllers\LugarTuristicoController');

	Route::get('showPDF/venta', [App\Http\Controllers\VentaController::class,'showPDF']);
	Route::get('createPDF/venta', [App\Http\Controllers\VentaController::class,'createPDF']);
	});