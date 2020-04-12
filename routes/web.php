<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',"ControllerPages@home");

//produits
Route::get('/produits/create',"ProduitsController@create")->middleware("auth");
Route::get('/produits/{produit}/edit',"ProduitsController@edit");
Route::get('/produits/{produit}',"ProduitsController@show")->name("produits.show");
Route::get('/produits',"ProduitsController@index")->name("produits.index");
Route::put('/produits/{produit}',"ProduitsController@update");
Route::post('/produits',"ProduitsController@store");
Route::delete('/produits/{produit}',"ProduitsController@destroy");
 

Route::get('/about',"ControllerPages@about");
Route::get('/contact',"ControllerPages@contact");
Route::post('/contact',"ControllerPages@store");


 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 
 

 

 
