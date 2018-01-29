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
Route::get('cancel',function (){
    return view('front.cancel-book');
})->name('cancel');
Route::post('find',['uses'=>'ReservationController@findReservation','as'=>'find-reservasi']);
Route::post('cancel-book',['uses'=>'ReservationController@cancelByUser','as'=>'cancel-user']);
Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);
Route::get('/room/{room_id}', ['uses' => 'IndexController@room', 'as' => 'room']);
Route::group(['prefix' => '/login'], function (){
    Route::get('/',['uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('/',[
        'uses' => 'Auth\LoginController@login',
        'as' => 'post.login'
    ]);
});
Route::post('kode-promo/check',['uses'=>'PromoCodeController@checkCode','as'=>'check-kode-promo']);
Route::get('/logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout'
]);
Route::get('/booking-summary/{book_id}', [
    'uses' => 'ReservationController@bookingSummary',
    'as' => 'summary'
]);
Route::match(['get','post'],'/search-room', [
    'uses' => 'RoomController@availableRooms',
    'as' => 'search-room'
]);
Route::match(['get','post'],'/check-change', [
    'uses' => 'RoomController@availableChangeDate',
    'as' => 'check-change'
]);
Route::match(['get','post'],'/token', function (){
    return csrf_token();
});
Route::post('/reservation', [
    'uses' => 'ReservationController@reservation',
    'as' => 'reservation'
]);
Route::post('/confirmation', [
    'uses' => 'ReservationController@sendConfirmation',
    'as' => 'send-confirmation'
]);

Route::group(['middleware' => 'auth','prefix' => '/admin'], function (){
    Route::get('/data-reservasi/{status}', ['uses' => 'ReservationController@reservationDT', 'as' => 'dt-reservasi']);
    Route::get('/', ['uses' => 'IndexController@adminIndex', 'as' => 'admin-index']);
    Route::resource('pengumuman','PengumumanController');
    Route::resource('room-categories', 'RoomCategoryController');
    Route::resource('rooms', 'RoomController');
    Route::resource('fasilitas','FasilitasController');
    Route::resource('contact','ContactController');
    Route::resource('layanan','LayananController');
    Route::resource('banner', 'BannerController');
    Route::resource('restaurant', 'RestaurantController');
    //Route::resource('user', 'UserController');
    Route::resource('kode-promo', 'PromoCodeController');
    Route::get('/admin-reservation', [
        'uses' => 'ReservationController@adminReservationIndex',
        'as' => 'admin-reservation'
    ]);
    Route::get('/detail-reservasi/{reservasi_id}', [
        'uses' => 'ReservationController@adminReservationDetail',
        'as' => 'detail-reservasi'
    ]);
    Route::match(['get','post'],'/laporan', [
        'uses' => 'LaporanController@index',
        'as' => 'laporan'
    ]);
    Route::post('/payment-confirmation', [
        'uses' => 'ReservationController@paymentConfirmation',
        'as' => 'payment-confirmation'
    ]);
    Route::post('/change-date',[
        'uses' => 'ReservationController@changeDate',
        'as' => 'change-date'
    ]);
});
Route::get('debugging',function (){
    dd(\App\Reservasi::with('roomReservation.roomType')->paginate(10));
});