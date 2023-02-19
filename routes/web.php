<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;

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


Route::get('/admin',function(){
    return redirect('admin/');
});

Auth::routes();

//Route::post('login','UserController@login')->name('login');
Route::get('/clear-cache',[OtherController::class,'clear_cache']);
Route::get('/migrate-run',[OtherController::class,'migrate_run']);

Route::middleware('auth')->group(function(){

      //test

});

Route::get('/', function() {
  return view('webviews/home');
});

Route::get('/about-us', function() {
  return view('webviews/about-us');
});
Route::get('/privacy-policy', function() {
  return view('webviews/privacy-policy');
});
Route::get('/terms-conditions', function() {
  return view('webviews/term-conditions');
});

Route::get('/contact-us', function() {
  return view('webviews/contact');
});

Route::get('/events',[EventController::class,'index'])->name('events');
Route::get('/event-details/{slug}/{event_id}',[EventController::class,'eventDetails'])->name('events-details');
//add admin
include('admin.php');