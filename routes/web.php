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
    return view('front.home');
});
Route::group(['prefix' => '/login'], function (){
    Route::get('/',function () {
        return view('admin.login');
    });
    Route::post('/',[
        'uses' => 'Auth\LoginController@login',
        'as' => 'post.login'
    ]);
});
Route::get('/logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout'
]);

Route::group(['middleware' => 'auth','prefix' => '/admins'], function (){
    Route::get('/',function () {
        return view('admin.blank');
    })->name('admin.home');
    Route::get('/pengumuman',[
        'uses' => 'PengumumanController@getListPengumuman',
        'as' => 'admin.pengumuman'
    ]);
    Route::post('/pengumuman',[
        'uses' => 'PengumumanController@addPengumuman',
        'as' => 'admin.add.pengumuman'
    ]);
    Route::post('/pengumuman/edit/{id}',[
        'uses' => 'PengumumanController@editPengumuman',
        'as' => 'admin.edit.pengumuman'
    ]);
    Route::get('/pengumuman/delete/{id}',[
        'uses' => 'PengumumanController@deletePengumuman',
        'as' => 'admin.delete.pengumuman'
    ]);
});
