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
$router->get('/', function () use ($router) {
    return $router->app->version();
});
*/

$router->get('/', [
    'as' => 'mellat.help', 'uses' => 'MellatController@help'
]);

$router->get('/mellat', [
    'as' => 'mellat.help', 'uses' => 'MellatController@help'
]);

$router->get('/mellat/serve', [
    'as' => 'mellat.serve', 'uses' => 'MellatController@index'
]);
$router->post('/mellat/serve', [
    'as' => 'mellat.serve', 'uses' => 'MellatController@index'
]);
$router->get('/mellat/gateway', [
    'as' => 'mellat.gateway', 'uses' => 'MellatController@gateway'
]);
$router->post('/mellat/gateway', [
    'as' => 'mellat.gateway', 'uses' => 'MellatController@gateway'
]);
$router->post('/mellat/callBack', [
    'as' => 'mellat.callBack', 'uses' => 'MellatController@callBack'
]);
$router->get('/mellat/wsdl', ['as' => 'mellat.wsdl', function () {
    return response(view('mellat.wsdl', ["location" => "yes"]))->header('Content-Type', 'text/xml');
}]);
$router->get('/mellat/IPayment', ['as' => 'mellat.pay.wsdl', function () {
    return response(view('mellat.wsdl2'))->header('Content-Type', 'text/xml');
}]);
