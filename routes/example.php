<?php
/**
 * Created by PhpStorm.
 * User: kripa
 * Date: 13/2/20
 * Time: 10:40 AM
 */

Route::group(['middleware' => 'auth:api'],  function() {
    Route::post('create', 'Example\ExampleController@createExample');
    Route::get('list' , 'Example\ExampleController@getAllExample');
    Route::get('{id}/update', 'Example\ExampleController@getExampleData');
    Route::put('{id}/update', 'Example\ExampleController@updateExample');
    Route::delete('{id}','Example\ExampleController@deleteExample');
});
