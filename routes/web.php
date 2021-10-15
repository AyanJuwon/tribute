<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Intervention\Image\Facades\Image;

Route::get('/programme','HomeController@programme')->name('program');

Route::get('/privacypolicy','HomeController@policy')->name('pandp');

Route::get('howitworks', 'HomeController@howitworks')->name('howitworks');

Route::get('/', 'HomeController@landingpage')->name('landing');

Route::get('/plans&features', 'HomeController@pricing')->name('pricing');

Route::get('contact-us', 'HomeController@contact')->name('contact');

Route::get('terms&conditions','HomeController@terms')->name('terms');

Route::get('about-us', 'HomeController@about')->name('about');

Route::get('searchresults', 'HomeController@search')->name('search');

Route::get('faq', 'HomeController@faq')->name('faq');

Route::get('memorial-view/{slug}', 'MemorialController@viewMemorial')->name('viewMemorial');


Auth::routes();

Route::get('login/{provider}/callback','SocialController@Callback')->name('facebookLogin');

// Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google');

// Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google');

//Route::get('forgot_password', 'ForgotPasswordController@showLinkRequestForm/{token}')->name('password.reset');

Route::middleware(['auth', 'admin'])->group(function(){
    Route::delete('memorial/delete/{memorial}', 'MemorialController@destroyMemorial')->name('memorial.destroy');

    Route::get('/stories', 'HomeController@story')->name('story');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/transaction-history', 'HomeController@payment')->name('paymenthistory');

    Route::get('/lifetimememorials', 'HomeController@adminMemorials')->name('allMem');

    Route::get('freememorials', 'HomeController@adminFreeMemorials')->name('freeMem');

    Route::get('suspendedmemorials', 'HomeController@adminSuspendedMemorials')->name('susMem');

    Route::get('yearlymemorials', 'HomeController@adminYearlyMemorials')->name('yearlyMem');

    Route::get('monthlymemorials', 'HomeController@adminMonthlyMemorials')->name('monthlyMem');

    Route::get('memorial-details/{slug}', 'HomeController@memDetails')->name('mem.details');

    Route::get('/home-tributes', 'HomeController@alltributes')->name('tributes.all');

    Route::get('/home-add-stories', 'HomeController@addStories')->name('stories.add');

    Route::get('/home-add-tributes', 'HomeController@addTributes')->name('tributes.add');

    Route::get('/home-edit-story/{story}','StoriesController@edit')->name('stories.edit');

    Route::match(['put', 'patch'], '/home-update-story/{story}', 'StoriesController@update')->name('stories.update');

    Route::get('/home-edit-tribute/{tribute}','TributeController@edit')->name('tribute.edit');

    Route::match(['put', 'patch'], '/home-update-tribute/{tribute}', 'TributeController@update')->name('tribute.update');

    Route::get('/home-users', 'HomeController@usersCount')->name('users.count');

    Route::get('/home-banned-users', 'HomeController@usersBanned')->name('users.banned');

    Route::delete('users/{user}', 'UsersController@destroy')->name('users.destroy');

    Route::get('users/view/{user}', 'UsersController@show')->name('user.show');

    Route::delete('users/{user}/activate', 'UsersController@activate')->name('users.activate');

    Route::delete('suspendMemorial/{memorial}','MemorialController@suspend')->name('suspend');

    Route::delete('activateMemorial/{memorial}','MemorialController@activateMemorial')->name('memorial.activate');

    Route::delete('activateTribute/{tribute}','TributeController@activateTribute')->name('tribute.activate');

    Route::delete('deactivateTribute/{tribute}','TributeController@deactivateTribute')->name('tribute.deactivate');

    Route::delete('deactivateStories/{story}','StoriesController@deactivateStories')->name('stories.deactivate');

    Route::delete('activateStories/{story}','StoriesController@activateStories')->name('stories.activate');

    Route::delete('deactivateImages/{image}','ImageController@deactivateImages')->name('image.deactivate');

    Route::delete('activateImages/{image}','ImageController@activateImages')->name('image.activate');

    Route::get('/banned-tributes', 'HomeController@adminBannedTributes')->name('tributes.banned');

    Route::get('/banned-stories', 'HomeController@adminBannedStories')->name('stories.banned');

    Route::get('/banned-images', 'HomeController@adminBannedImages')->name('images.banned');

    Route::get('/home-add-admin', 'AdminController@addAdmin')->name('addAdmin');

    Route::get('/home-allAdmins', 'AdminController@allAdmin')->name('allAdmin');

    Route::post('/home-store', 'AdminController@store')->name('admin.store');

    Route::delete('admin/{user}', 'AdminController@destroy')->name('admin.destroy');

    Route::get('/home-add-image', 'ImageController@addImage')->name('addImage');

    Route::get('/home-all-images', 'ImageController@allImages')->name('allImages');

    Route::get('/transaction-details/{id}', 'PaymentController@show')->name('paymentDet');

});


Route::middleware(['auth', 'check-id'])->group(function(){

    Route::get('/myaccount/{id}/user_details', 'MemorialController@myaccount')->name('myaccount');

    Route::post( 'update/{id}', 'MemorialController@update')->name('update');

    Route::get('/myaccount/{id}/changepassword', 'MemorialController@forPassword')->name('forPassword');

});

Route::middleware(['auth'])->group(function (){

    Route::get('/memorials', 'MemorialController@memorials')->name('memorials');

    Route::get('user/dashboard', 'MemorialController@dashboard')->name('user.dashboard');

    Route::get('/creatememorial', 'MemorialController@createMemorial')->name('createMemorial');

    Route::post('/storememorial', 'MemorialController@store')->name('store.memorial');

    Route::post('/update-password', 'MemorialController@changePassword')->name('change.password');

    Route::delete('tribute/{tribute}', 'TributeController@destroy')->name('tribute.destroy');

    Route::delete('story/{story}', 'StoriesController@destroy')->name('stories.destroy');

    Route::delete('image/{image}', 'ImageController@destroy')->name('image.destroy');

    Route::get('/{memorial}/renewsubscription', 'MemorialController@renew')->name('renew');

    Route::post('/{memorial}/renew', 'MemorialController@storeRenew')->name('store.renew');

    Route::get('paymentdetails', 'MemorialController@paymentdetails')->name('payment');

//    Route::delete('image/{image}', 'ImageController@destroy')->name('deleteImage');

});

Route::middleware(['auth','check-mem-id'])->group(function(){
    Route::get('/{memorial}/renewsubscription', 'MemorialController@renew')->name('renew');

    Route::post('/{memorial}/renew', 'MemorialController@storeRenew')->name('store.renew');

    Route::get('/{memorial}/upgradesubscription', 'MemorialController@upgrade')->name('upgrade');

    Route::post('/{memorial}/upgrade', 'MemorialController@storeUpgrade')->name('store.upgrade');
});


Route::middleware(['check-route', 'check-date'])->group(function(){

    Route::get('/{slug}', function ($slug){
      return redirect(\route('welcome', $slug))->with('message');
    });

    Route::get('/{slug}/gallery','HomeController@gallery')->name('gallery');

    Route::get('/{slug}/about', 'HomeController@welcome')->name('welcome');

    Route::post('/{slug}/tribute', 'TributeController@store')->name('tributes.save');

    Route::get('/{slug}/tribute','HomeController@tribute')->name('tribute');

    Route::get('/{slug}/stories','HomeController@stories')->name('stories');

    Route::post('/{slug}/story', 'StoriesController@store')->name('stories.save');

    Route::post('/{slug}/updategeneralinformation', 'MemorialController@generalInfo')->name('generalInfo');

    Route::post('/{slug}/updatepersonalphraseandmainsectiontext', 'MemorialController@personalPhrase')->name('personalPhrase');

    Route::get('/{slug}/deleteuserimage/{id}', 'ImageController@testimage')->name('testimage');

    Route::post('/{slug}/userpostimage', 'ImageController@store')->name('image.save');

    Route::get('/{slug}/life', 'HomeController@life')->name('life');

    Route::post('/{slug}/lifesaver', 'MemorialController@life')->name('life.save');

});