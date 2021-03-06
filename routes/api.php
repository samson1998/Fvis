<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');
    Route::get('user', 'Api\AuthController@user');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh')->middleware('jwt.auth');
    Route::get('email/resend', 'Api\VerificationController@resend')->name('verification.resend');
    Route::get('email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');
});

Route::group(['middleware' => 'jwt.verify'], function () {
   Route::post('loans/bvnlookup', 'Api\LoansController@bvnlookup');
   Route::post('loans/creditscore', 'Api\LoansController@creditscore');
   Route::post('submitloan', 'Api\LoansController@submitloan');
   Route::get('user/getbanks', 'Api\UsersController@getBanks');
   Route::get('user/stats', 'Api\UsersController@stats');
   Route::get('user/loanhistory/{id}', 'Api\LoansController@userloans');
   Route::post('user/subprofile', 'Api\UsersController@updateprofile');
    Route::post('user/profilepic', 'Api\UsersController@updatepic');
    Route::post('user/fundstransfer', 'Api\UsersController@fundstransfer');
    Route::post('user/repayloan', 'Api\UsersController@repayloan');
    Route::post('user/topup', 'Api\UsersController@topup');
    Route::post('user/subscription', 'Api\UsersController@subscription');
    Route::post('user/apply', 'Api\JobsController@apply');
   
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/stats/{id}', 'Api\admin\SomeController@stats');
    Route::get('admin/loan/{id}', 'Api\admin\SomeController@loanUser');
    Route::post('admin/updateloanstatus/{id}', 'Api\admin\SomeController@updateloanstatus');
    Route::get('admin/loans', 'Api\admin\SomeController@loans');
    Route::get('admin/loans/{options}', 'Api\admin\SomeController@getloanoptions');
    Route::get('admin/galleries', 'Api\admin\SomeController@galleries');
    Route::post('admin/addcategory', 'Api\PostController@addcategory');
    Route::post('admin/addpost', 'Api\PostController@addPost');
    Route::post('admin/savepost_image', 'Api\PostController@savepost_image');
    Route::get('admin/getcat', 'Api\PostController@listcategories');
    Route::get('admin/getposts/{id}', 'Api\PostController@listpost');
    Route::get('admin/getsinglepost/{id}', 'Api\PostController@singlepost');
    Route::get('admin/manageusers', 'Api\admin\SomeController@manageusers');
    Route::post('admin/subprofile', 'Api\admin\SomeController@updateprofile');
    Route::post('admin/profilepic', 'Api\admin\SomeController@updatepic');
    Route::post('admin/savegallery', 'Api\admin\SomeController@storegallery');
    Route::post('admin/makeadmin', 'Api\admin\SomeController@makeadmin');
    Route::post('admin/jobs', 'Api\JobsController@store');
    Route::post('admin/jobs/update', 'Api\JobsController@updateJob');
    Route::get('admin/jobs/applications', 'Api\JobsController@listJobApplications');
    Route::get('admin/jobs/{id}', 'Api\JobsController@getJobByID');
});

Route::get('tweets', 'Api\TwitterController@tweets');
Route::post('user/contactus', 'Api\UsersController@contactus');
Route::get('getposts/{id}', 'Api\PostController@listpost');
Route::get('post/{slug}', 'Api\PostController@getsinglepost');
Route::get('gallery/{slug}', 'Api\PostController@getsinglegallery');
Route::get('admin/listcat', 'Api\PostController@listcategories');
Route::get('getgalleries', 'Api\PostController@getgalleries');
Route::get('cron', 'Api\UsersController@cron');

Route::group(['prefix' => 'user'], function () {
    Route::post('talentdev', 'Api\ServiceFormController@storeTalentDevForm');
    Route::post('commoditytrading', 'Api\ServiceFormController@storeCommodityTradingForm');
    Route::post('corporatefinance', 'Api\ServiceFormController@storeCorporateFinanceForm');
    Route::post('oilandgas', 'Api\ServiceFormController@storeOilAndGasForm');
    Route::post('fixedinvestment', 'Api\ServiceFormController@storeFixedInvestmentForm');
    Route::post('projectfinance', 'Api\ServiceFormController@storeProjectFinanceForm');
    Route::post('realestate', 'Api\ServiceFormController@storeRealEstateForm');
    Route::post('financerequest', 'Api\ServiceFormController@storeFinanceRequest');
    Route::post('volunteerapplication', 'Api\ServiceFormController@storeVolunteerApplicationForm');
    Route::post('charity', 'Api\ServiceFormController@storeCharityRequest');
    Route::get('jobs', 'Api\JobsController@listjobs');
    Route::get('jobs/{slug}', 'Api\JobsController@getSingleJob');   
});
