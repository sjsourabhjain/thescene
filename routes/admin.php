<?php

//Route::get('/game','UserController@game')->name('game');
Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('/','LoginController@index')->name('home');
    Route::any('/admin-login','LoginController@login')->name('login');
    Route::get('/forgot','LoginController@forgot_password')->name('forgot_password');
    Route::post('/send-verification-email','LoginController@send_verification_email')->name('send_verification_email');
    Route::get('/reset-password/{token}','LoginController@reset_password')->name('reset_password');
    Route::post('/reset/{token}','LoginController@reset')->name('reset');
    Route::get('/admin-logout','LoginController@logout')->name('logout');
    Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
});

Route::prefix('/admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->middleware('auth:admin')->group(function(){

    Route::get('/dashboard','UserController@dashboard')->name('dashboard');
    Route::get('/profile-user/{id}','UserController@profile')->name('profile_user');

    /*sub admin module*/
    Route::group(['middleware'=>'permission:sub_admin_manage'],function(){
        Route::get('/list-sub-admin', 'SubAdminController@index')->name('list_sub_admin');
        Route::get('/create-sub-admin', 'SubAdminController@create')->name('create_sub_admin');
        Route::post('/store-sub-admin', 'SubAdminController@store')->name('store_sub_admin');
        Route::get('/show-sub-admin/{id}', 'SubAdminController@show')->name('show_sub_admin');
        Route::get('/edit-sub-admin/{id}', 'SubAdminController@edit')->name('edit_sub_admin');
        Route::post('/update-sub-admin', 'SubAdminController@update')->name('update_sub_admin');
        Route::get('/delete-sub-admin/{id}', 'SubAdminController@destroy')->name('delete_sub_admin');
        Route::get('/update-sub-admin-status/{id}', 'SubAdminController@update_sub_admin_status')->name('update_sub_admin_status');
    });

    /* user module*/
    Route::group(['middleware'=>'permission:user_manage'],function(){
        Route::get('/list-user','UserController@index')->name('list_user');
        Route::get('/create-user','UserController@create')->name('create_user');
        Route::post('/store-user','UserController@store')->name('store_user');
        Route::get('/show-user/{id}','UserController@show')->name('show_user');
        Route::get('/edit-user/{id}','UserController@edit')->name('edit_user');
        Route::post('/update-user','UserController@update')->name('update_user');
        Route::get('/delete-user/{id}','UserController@destroy')->name('delete_user');
        Route::get('/update-user-status/{id}','UserController@update_user_status')->name('update_user_status');
    });

    /* Ticket Type Module*/
    Route::get('/list-tickettype','TicketTypeController@index')->name('list_tickettype');
    Route::get('/create-tickettype','TicketTypeController@create')->name('create_tickettype');
    Route::post('/store-tickettype','TicketTypeController@store')->name('store_tickettype');
    // Route::get('/show-tickettype/{id}','TicketTypeController@show')->name('show_tickettype');
    Route::get('/edit-tickettype/{id}','TicketTypeController@edit')->name('edit_tickettype');
    Route::post('/update-tickettype','TicketTypeController@update')->name('update_tickettype');
    // Route::get('/delete-tickettype/{id}','TicketTypeController@destroy')->name('delete_tickettype');


    /* Category module*/
    Route::get('/list-category','CategoryController@index')->name('list_category');
    Route::get('/create-category','CategoryController@create')->name('create_category');
    Route::post('/store-category','CategoryController@store')->name('store_category');
    // Route::get('/show-category/{id}','CategoryController@show')->name('show_category');
    Route::get('/edit-category/{id}','CategoryController@edit')->name('edit_category');
    Route::post('/update-category','CategoryController@update')->name('update_category');
    Route::get('/delete-category/{id}','CategoryController@destroy')->name('delete_category');
    Route::get('/update-category-status/{id}','CategoryController@updateCategoryStatus')->name('update_category_status');


    /* Slider module*/
    Route::get('/list-slider','SliderController@index')->name('list_slider');
    Route::post('/prepare-list-slider','SliderController@prepare_list_sliders')->name('prepare_list_sliders');
    Route::get('/create-slider','SliderController@create')->name('create_slider');
    Route::post('/store-slider','SliderController@store')->name('store_slider');
    Route::get('/show-slider/{id}','SliderController@show')->name('show_slider');
    Route::get('/edit-slider/{id}','SliderController@edit')->name('edit_slider');
    Route::post('/update-slider','SliderController@update')->name('update_slider');
    Route::get('/update-slider-status/{id}','SliderController@update_slider_status')->name('update_slider_status');
    Route::get('/delete-slider/{id}','SliderController@destroy')->name('delete_slider');


    /* event module*/
    Route::get('/list-events','EventController@index')->name('list_events'); 
    Route::get('/create-event','EventController@create')->name('create_events');
    Route::post('/store-event','EventController@store')->name('store_event');
    Route::get('/show-event/{id}','EventController@show')->name('show_event');
    Route::get('/edit-event/{id}','EventController@edit')->name('edit_event');
    Route::post('/update-event','EventController@update')->name('update_event');
    Route::delete('/delete-event/{id}','EventController@destroy')->name('delete_event');

    /* sell ticket module*/
    Route::get('/list-sell-ticket','SellTicketController@index')->name('list_sell_ticket'); 
    Route::get('/show-sell-ticket/{id}','SellTicketController@show')->name('show_sell_ticket');

    /* contact-us module*/
    Route::get('/list-contactus','ContactUsController@index')->name('list_contactus');
    Route::get('/show-contactus/{id}','ContactUsController@show')->name('show_contactus'); 
    Route::get('/delete-contactus/{id}','ContactUsController@destroy')->name('delete_contactus');

    /* offer module*/
    Route::get('/list-offer','OfferController@index')->name('list_offer');
    Route::get('/create-offer','OfferController@create')->name('create_offer');
    Route::post('/store-offer','OfferController@store')->name('store_offer');
    Route::get('/show-offer/{id}','OfferController@show')->name('show_offer');
    Route::get('/edit-offer/{id}','OfferController@edit')->name('edit_offer');
    Route::post('/update-offer','OfferController@update')->name('update_offer');
    Route::delete('/delete-offer/{id}','OfferController@destroy')->name('delete_offer');

    /* order module*/
    Route::get('/list-order','OrderController@index')->name('list_order');
    Route::get('/show-order/{id}','OrderController@show')->name('show_order');

    /* CMS module*/
    Route::get('/list-cms','CmsController@index')->name('list_cms');
    Route::get('/create-cms','CmsController@create')->name('create_cms');
    Route::post('/store-cms','CmsController@store')->name('store_cms');
    Route::get('/show-cms/{id}','CmsController@show')->name('show_cms');
    Route::get('/edit-cms/{id}','CmsController@edit')->name('edit_cms');
    Route::post('/update-cms','CmsController@update')->name('update_cms');
    Route::delete('/delete-cms/{id}','CmsController@destroy')->name('delete_cms');

    /* Setting module*/
    Route::get('/edit-setting','SettingController@edit')->name('edit_setting');
    Route::post('/update-setting','SettingController@update')->name('update_setting');
    Route::get('/edit-settings','SettingController@edit_settings')->name('edit_settings');
    Route::post('/update-settings','SettingController@update_settings')->name('update_settings');
    
});