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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['middleware' => 'cors', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('/cors', function () use ($app) {
    	return  $app->version()." - Middleware CORS";
	});
});

$app->get('/user', 'UserController@index');
$app->get('/user/{id}', 'UserController@show');
$app->post('/user', 'UserController@store');
$app->put('/user/{id}', 'UserController@update');
$app->delete('/user/{id}', 'UserController@destroy');
