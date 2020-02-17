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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-griya', 'GriyaController@add')->name('add_griya');

Route::get('/data-griya', 'GriyaController@view')->name('view_griya');

Route::get('/add-pengajar', 'PengajarController@add')->name('add_pengajar');

Route::get('/data-pengajar', 'PengajarController@view')->name('view_pengajar');

Route::get('/add-santri', 'SiswaController@add')->name('add_santri');

Route::post('/detail-santri', 'SiswaController@detail')->name('detail_santri');

Route::post('/detail-pembelajaran', 'PembelajaranController@detail')->name('detail_pembelajarani');

Route::get('/data-santri', 'SiswaController@view')->name('view_santri');

Route::get('/pembelajaran', 'PembelajaranController@view')->name('pembelajaran');

Route::get('/konten-belajar', 'PembelajaranController@pembelajaranTable')->name('pembelajaran-table');

Route::group(['prefix' => 'submit', 'as' => 'submit.'] ,function(){

    Route::post('/griya', 'GriyaController@submit');
    
    Route::post('/pengajar', 'PengajarController@submit');

    Route::post('/siswa', 'SiswaController@submit');

    Route::post('/pembelajaran', 'PembelajaranController@submit');

    Route::post('/pembelajaran-dinar', 'PembelajaranController@submitDinar');

    Route::post('/pembelajaran-liqo', 'PembelajaranController@submitLiqo');

});

Route::group(['prefix' => 'remove', 'as' => 'remove.'] ,function(){

    Route::post('/pengajar', 'PengajarController@remove');

    Route::post('/siswa', 'SiswaController@remove');

    Route::post('/griya', 'GriyaController@remove');

});

Route::group(['prefix' => 'select', 'as' => 'select.'] ,function(){

    Route::get('/data-pengajar', 'PengajarController@dataPengajarSelect');

    Route::get('/data-griya', 'GriyaController@dataGriyaSelect');

});


Route::group(['prefix' => 'detail', 'as' => 'detail.'] ,function(){

    Route::post('/griya', 'GriyaController@detail');

    Route::post('/pengajar', 'PengajarController@detail');

});

Route::group(['prefix' => 'update', 'as' => 'update.'] ,function(){

    Route::post('/griya', 'GriyaController@update');

    Route::post('/pengajar', 'PengajarController@update');

});