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

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::get('/admin', function(){
    return view('admin.index');
});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/cat', 'AdminCategoriesController');
    Route::get('admin/media/index', 'MediaController@index');
    Route::get('admin/media/create', ['as'=>'admin.media.create', 'uses'=>'MediaController@create']);
    Route::post('admin/media/store',['as'=>'admin.media.store', 'uses'=>'MediaController@store']);
    Route::delete('admin/media/destroy/{id}',['as'=>'admin.media.destroy', 'uses'=>'MediaController@destroy']);

    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');

});

Route::delete('/delete/media', 'MediaController@deleteMedia');

Route::get('/str', function(){

    $name = 'Jose Luis';
    echo str_replace([' '],['_'], $name);

    $user = Auth::user()->name;
    echo  $user;

});

Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});


