<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Illuminate\Http\Request;



/*
 * get register page
 * */
Route::get('register', array('as'=>'register','uses'=>'AccountController@getRegister'));


/*
 * get logout page
 * */
Route::get('logout',array('as'=>'logout','uses'=>'AccountController@getLogout'));


/*
 * get login page
 * */
Route::get('login',array('as'=>'login','uses'=>'AccountController@getLogin'));


/*
 * [post] login page
 * */
Route::post('login',array('as'=>'login','uses'=>'AccountController@postLogin'))->before('csrf');

/*
 * post register data
*/
Route::post('register',array('as'=>'post-register','uses'=>'AccountController@postRegister'))->before('csrf');


/*
 *  get home page
 * */

//Route::get('home',array('as'=>'home','uses'=>'HomeController@getHome'))->before('auth');

/*
 *[GET] user posts
 *
 *  */
Route::get('userposts',array('as'=>'user-posts','PostController@getUserPosts'));




/*
 * [get] new post
 *
 * */
Route::get('newpost',array('as'=>'new-post','uses'=>'PostController@getNewPost'))->before('auth');

/*
 *
 * [post] new post
 * */
Route::post('newpost',array('as'=>'new-post','uses'=>'PostController@postNewPost'))->before('csrf');


/*
 * [GET] Single problem
 */
Route::get('problem/{id}',array('as'=>'problem','uses'=>'PostController@getPost'))->before('auth');
Route::get('problem/',array('as'=>'problem-single'))->before('auth');

/*
 * [GET] Submit Single problem
 */
Route::get('problem/submit/{id}',array('as'=>'submit-problem','uses'=>'PostController@getSubmit'))->before('auth');
Route::get('problem/submit/',array('as'=>'submit-problem-single'))->before('auth');

/*
 * [POST] send submit
 *
 * */
Route::post('problem/send',['as'=>'problem-send','uses'=>'PostController@postSubmit'])->before('csrf');

/*
 *
 * [GET] all user submissions
 */

Route::get('user/submissions',['as'=>'user-submissions','uses'=>'PostController@getSubmissions'])->before('auth');

/*
 * [GET] all submission for admins editing
 * */
Route::get('admin/submissions',['as'=>'admin-submissions','uses'=>'PostController@getAdminSubmissions'])->before('auth');

/*
 * [GET] single submission for editing
 */
Route::get('admin/submit',array('as'=>'submit-single'))->before('auth');
Route::get('admin/submit/{id}',array('as'=>'submit','uses'=>'PostController@getAdminSubmit'))->before('auth');



/*
 * [Post] single submit edit
 *
 * */
Route::post('admin/submit',['as'=>'post-submit','uses'=>'PostController@postAdminSubmit'])->before('auth');


Route::get('score',['as'=>'score','uses'=>'AccountController@getScore'])->before('auth');


/*
 * [GET] all problems
 *
 */
Route::get('/',array('as'=>'home','uses'=>'PostController@getAll'))->before('auth');




