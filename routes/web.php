<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/index', function () {
//     return view('content.contents');
// });

// Route::get('/userlist','adminController@userlist')->name('userlist')->middleware('auth');

Route::get('/talkroom','gamersController@showTalkroom')->name('talkroom')->middleware('auth');

Route::get('/talkroom_delete','gamersController@deleteTalkroom')->name('talkroom_delete')->middleware('auth');

Route::post('/save_bookmark','gamersController@saveBookmark')->name('save_bookmark')->middleware('auth');

Route::post('/remove_bookmark','gamersController@removeBookmark')->name('remove_bookmark')->middleware('auth');

Route::post('comment_post','gamersController@comment_post')->name('comment_post')->middleware('auth');

Route::get('comment_del','gamersController@comment_del')->name('comment_del')->middleware('auth');

Route::post('/like', 'gamersController@like');

Route::post('/unlike', 'gamersController@unlike');

Route::get('/MyProfile','gamersController@myProfile')->name('my_profile')->middleware('auth');

Route::get('/profile','gamersController@profile')->name('profile')->middleware('auth');

Route::get('/MyProfile/edit','gamersController@profile_edit')->name('profile_edit')->middleware('auth');

Route::get('/favorite_room','gamersController@favo')->name('favo')->middleware('auth');

Route::post('/upload_confirm','gamersController@update_confirm');

Route::get('/follow','FollowController@followList')->name('follow')->middleware('auth');

Route::get('/follower','FollowController@followerList')->name('follower')->middleware('auth');

Route::post('/follow_process','FollowController@followProcess')->middleware('auth');

Route::post('/remove_follow','FollowController@removeFollow')->middleware('auth');

Route::get('/userlist','adminController@userlist')->name('userlist')->middleware('auth');

Route::get('/user_detail','adminController@userdetail')->middleware('auth');

Route::get('/user_detail/{id}','adminController@userdetail')->name('user_detail')->middleware('auth');

Route::get('/deleted_room','adminController@deletedRoom')->name('deleted_room')->middleware('auth');

Route::get('/restoration','adminController@restoration')->name('restoration')->middleware('auth');

Route::get('/delete_permanently','adminController@deletePermanently')->name('delete_permanently')->middleware('auth');

Auth::routes();

Route::post('/account_status/{id}','adminController@accountStatus')->name('account_status')->middleware('auth');

Route::get('/create','ResourceController@create')->name('create')->middleware('auth');

Route::post('/confirm','ResourceController@store')->name('confirm')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
