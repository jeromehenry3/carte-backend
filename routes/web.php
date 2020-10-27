<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Http\Response;

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
    // $user = Auth::user();
    return $router->app->version();
});
// 'UserController@update'
$router->post('/login', 'UserController@login');

$router->post('/check', 'UserController@check');

$router->post('/users/create', 'UserController@create');

$router->post('/places/add', 'PlaceController@add');

$router->get('/places/get_all', 'PlaceController@get_all');
// $router->post('/login', function () use ($router) {
//     // dump($request);
//     $environment = app()->environment();
//     // dump($request);
//     // dump($environment);
//     // return response()->json(['name' => 'hello'])
//     //         ->header('Access-Control-Allow-Origin', 'localhost:4200');

//     return response()->json(['name' => 'hello'])->header('Access-Control-Allow-Origin', '*');
// });
