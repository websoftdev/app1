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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/r/{id}', function($id){

    $roles = App\Role::find($id);

    $roles->users;

});


Route::get('/admin', function(){
    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/cat', 'AdminCategoriesController');

});

Route::get('/str', function(){

    $name = 'Jose Luis';
    echo str_replace([' '],['_'], $name);

    $user = Auth::user()->name;
    echo  $user;

});