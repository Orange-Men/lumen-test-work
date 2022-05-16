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
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/user/register', [
        'uses' => 'Auth\RegisterController@store',
        'as' => 'register',
    ]);
    $router->post('/user/sign-in', [
        'uses' => 'Auth\SignInController@signUp'
    ]);
    $router->post('/user/recover-password', 'Auth\RequestPasswordController@sendResetLinkEmail');
    $router->put('/user/recover-password', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);

    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('user/companies', 'CompanyController@index');
        $router->post('user/companies', 'CompanyController@store');
    });
});
