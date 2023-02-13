<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

Route::get('/', function () {
    return "welcome API Order";
});
$router->group(['prefix' => 'api', 'namespace' => 'Api'], function () use ($router) {
    $router->get('/profile/{id}', ['uses' => 'ProfileController@userProfile']);
     $router->post('/profile/create', ['uses' => 'ProfileController@profileCreate']);
});