<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//Route::group(['middleware'=>['web']],function(){

	Route::post('/signup',['uses'=>'UserController@postSignUp',
		'as'=>'signup']);

	/*Route::get('/home', function () {
    return view('welcome');
     })->name('home');*/

  Route::get('/login',[
      'uses'=>'UserController@getLogin',
      'as'=>'login'
    ]);

  Route::get('/dashboard',['uses'=>'PostController@getDashboard',
		'as'=>'dashboard'])->middleware('authenticated');


  Route::post('/signin',['uses'=>'UserController@postSignIn',
		'as'=>'signin']);

  Route::post('/createpost',[
  	'uses'=>'PostController@postCreatePost',
  	'as'=>'createpost'
  	])->middleware('authenticated');

   Route::get('/post-delete/{post_id}',[
    'uses'=>'PostController@getDeletePost',
    'as'=>'post.delete'
    ])->middleware('authenticated');

    Route::get('/logout',['uses'=>'UserController@getLogout',
    'as'=>'logout']);

    Route::post('/edit',[
      'uses'=>'PostController@postEditPost',
      'as'=> 'edit'
      ])->middleware('authenticated');

    Route::get('/account',[
      'uses'=>'UserController@getAccount',
      'as'=>'account'
      ])->middleware('authenticated');
 

    Route::post('/updateaccount',[
      'uses'=>'UserController@postSaveAccount',
      'as'=>'updateaccount'
      ])->middleware('authenticated');

    Route::get('/userimage/{filename}',[
      'uses'=>'UserController@getUserImage',
      'as'=>'account.image'

      ])->middleware('authenticated');

//});


Route::get('/test',[
      'uses'=>'UserController@test_val',
      'as'=>'/test'
    ]);
