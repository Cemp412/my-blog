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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');
Route::match(['get', 'post'], '/admin', 'AdminController@login');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' =>['auth']],function(){
	Route::match(['get', 'post'], '/admindashboard', 'AdminController@dashboard');

//  Profile Routes

Route::match(['get', 'post'], '/admin/add_profile', 'ProfileController@addprofile');
Route::get('/admin/view_profile', 'ProfileController@viewprofile');
Route::match(['get', 'post'],'/admin/edit_profile/{id}', 'ProfileController@editprofile');
Route::get('/delete/{id}', 'ProfileController@deletes');

//BlogPost Routes
Route::match(['get', 'post'], '/admin/add_blogpost', 'BlogpostController@add_blogpost');
Route::get( '/admin/view_blogpost', 'BlogpostController@view_blogpost');
Route::match(['get', 'post'], '/admin/edit_blogpost/{id}', 'BlogpostController@edit_blogpost');
Route::match(['get', 'post'], '/admin/delete_blogpost/{id}', 'BlogpostController@delete');

//About Routes
Route::match(['get', 'post'], '/admin/add_about', 'AboutController@add_about');
Route::get('/admin/view_about', 'AboutController@view_about');
Route::match(['get', 'post'], '/admin/edit_about/{id}', 'AboutController@edit_about');
Route::get('/admin/delete_about/{id}', 'AboutController@delete');



});
Route::get('/logout', 'AdminController@logout');
Route::get('/about', 'AboutController@about');
Route::match(['get', 'post'], '/blog_post/{id}', 'BlogpostController@blogpost');

