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
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
        /* ニュースの新規投稿画面を表示する */
    Route::get('news/create','Admin\NewsController@add');
    /* 入力データでニュースを新規作成する */
    Route::post('news/create','Admin\NewsController@create');
    /* プロフィールの新規作成画面表示 */
    Route::get('profile/create','Admin\ProfileController@add');
    /* 入力データでプロフィールを新規作成 */
    Route::post('profile/create','Admin\ProfileController@create');
    /* プロフィール編集画面を表示 */
    Route::get('profile/edit','Admin\ProfileController@edit');
    /* 入力データでプロフィールを更新する */
    Route::post('profile/edit','Admin\ProfileController@update');
});

/*「http://XXXXXX.jp/XXX というアクセスが来たときに、 
AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。*/

//Route::get('XXX','AAAContriller@bbb');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
