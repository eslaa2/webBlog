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

Route::get('/','HomeController@index')->name('home');
Route::get('/home/{id?}', 'HomeController@index')->name('home');

 Auth::routes();
//post Routes
Route::group(['middleware'=>'auth'],function(){   
Route::get('post/index', 'PostController@index')->name('post.index');
Route::get('/post/create','PostController@create')->name('post.create');
Route::get('/post/edit','PostController@edit')->name('post.edit');
Route::POST('/post/store','PostController@store')->name('post.store');
Route::post('/post/update/{id}','PostController@update')->name('post.update');
Route::post('/post/destroy','PostController@destroy')->name('post.destroy');
Route::get('/post/view/{id}','PostController@view')->name('post.view');

// categories Route
Route::get('/category','categoryController@index')->name('category.index');
Route::post('/category/store','categoryController@store')->name('category.store');
Route::get('/category/create','categoryController@create')->name('category.create');
Route::get('/category/update/{id}','categoryController@update')->name('category.update');
Route::get('/category/delete/{id}','categoryController@delete')->name('category.delete');

//Route to get post details
Route::get('/post/{id}','HomeController@index')->name('full.post');
//route to send comment
Route::post('/comments','homeController@comment')->name('comments');
//Route to approve comment
Route::Post('/approve/{id}','PostController@Approve')->name('approve');
//Route admin view posts
Route::get('/viewpost','PostController@allPost')->name('view.post');
// route for User
Route::get('/user','UserController@index')->name('user');
Route::get('/user/edit','UserController@edit')->name('user.edit');
  
});// filter all request and see if user is logined in using middleware

