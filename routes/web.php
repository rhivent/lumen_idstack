<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//General Application Key
// $router->get('/key', function(){
	// return str_random(32);
// });

$router->get('/key','ExampleController@generateKey');

$router->post('/foo','ExampleController@fooExample');

$router->get('/user/{id}','ExampleController@getUser');

$router->get('/post/cat1/{cat1}/cat2/{cat2}','ExampleController@getPost');

$router->get('/profile',['as'=>'profile','uses' =>'ExampleController@getProfile']);
$router->get('/profile/action',['as'=>'profile.action','uses'=>'ExampleController@getProfileAction']);

$router->get('/admin/home',['middleware'=>'age' , function(){
	return 'Old Enough';
}]);

$router->get('/admin/home',['middleware'=>'age' , 'uses'=>'ExampleController@methodNew']);

$router->get('foo/bar','ExampleController@fooBar');
$router->get('bar/foo','ExampleController@fooBar');

$router->post('user/profile/request','ExampleController@userProfile');


$router->get('/fail',function(){
	return 'Not yet mature';
});

$router->get('/response','ExampleController@response');

/* $router->get('/foo',function(){
	return 'Hello, Get Method';
});

//the router allows you to register routes that respond to any http verb
$router->put('/put',function(){
	return 'PUT';
});

$router->post('/post',function(){
	return 'POST';
});

$router->get('/get',function(){
	return 'GET';
});

$router->patch('/patch',function(){
	return 'PATCH';
});

$router->delete('/delete',function(){
	return 'DELETE';
});

$router->options('/options',function(){
	return 'OPTIONS';
});
// basic route parameter
$router->get('/user/{id}',function($id){
	return 'User Id= '. $id;
});

$router->get('/post/{postId}/comments/{commentsId}',function($postId,$commentsId){
	return 'Post Id= '. $postId . ' Comment ID = ' . $commentsId;
});

//optional route parameter
$router->get('/optionals[/{param}]',function($param = null){
	return $param;
});

$router->get('profile',function(){
	return redirect()->route('route.profile');
});

$router->get('profile/riventus' , ['as' => 'route.profile', function(){
	return 'Route Riventus';
}]);

$router->group(['prefix'=>'admin','middleware' =>'auth','namespace'=>''], function() use($router){
	$router->get('home', function(){
		return 'Home Admin';
	});
	
	$router->get('profile',function(){
		return 'profile Admin';
	});
}); */