<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SellTicketController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PaymentController;


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
Route::get('/sell-ticket', function() {
  return view('webviews/sell-ticket');
});
Route::get('/register', function() {
  return view('webviews/register');
});
Route::get('/login', function() {
  return view('webviews/login');
});
Route::get('/ticket-detail', function() {
  return view('webviews/ticket-detail');
});

Route::get('/reset-password', function() {
  return view('webviews/resetpswrd');
});
Route::get('/profile', function() {
  return view('webviews/profile');
});
Route::post('login',[UserController::class,'login'])->name('login');
Route::post('register',[UserController::class,'register'])->name('register');
Route::post('contact-us',[ContactUsController::class,'contact'])->name('contact-us');
Route::get('/create-event',[EventController::class,'create'])->name('create-event');
Route::get('/events',[EventController::class,'index'])->name('events');
Route::get('/event-details/{slug}/{event_id}',[EventController::class,'eventDetails'])->name('events-details');																		
Route::get('/ticket-booking/{slug}',[EventController::class,'ticketBooking'])->name('ticket-booking');																		
Route::post('store-event',[EventController::class,'store'])->name('store-event');

Route::controller(PaymentController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});
//add admin
include('admin.php');
