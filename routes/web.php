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



Route::group(['middlewareGroups' => 'web'], function () {

	Route::auth();
    Route::get('/salir', 'HomeController@salir');
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/search', 'HomeController@searchParts');
    Route::get('/busqueda', 'HomeController@busqueda');
    Route::get('/busqueda/{cadena}', 'HomeController@busqueda');
    Route::post('/busquedaProcesar', 'HomeController@busquedaProcesar');
    Route::get('/gps', 'HomeController@gps');
    Route::get('/gpsParts', 'HomeController@gpsParts');
    Route::get('/test', 'HomeController@test');
    Route::get('/subirImagen', 'HomeController@subirImagen');

    Route::get('/admin/parts', 'AdminController@index');
    Route::get('/admin/parts/category/{id}', 'AdminController@partsCategory');

      Route::get('/local', 'LocalController@index');

    Route::get('/turno', 'HomeController@turno');
    Route::get('/turno/{cedula}', 'HomeController@turnoIngresar');

    Route::group(['middleware' => ['auth']], function () {
        // All routes you put here can be accessible to all authenticated users
        Route::get('/profile', 'HomeController@profile');
        Route::get('/profile/create', 'HomeController@profileCreate');
        Route::post('/profile', 'HomeController@profileStore');
        Route::put('/profile/edit', 'HomeController@profileUpdate');
       // Route::put('/profile', 'HomeController@profileUpdate');
    });


    Route::group(['middleware' => ['auth', 'role:cliente']], function () {
        // All routes you put here can be accessible to all authenticated users
        Route::get('/cliente', 'ClienteController@index');
    });

    Route::group(['middleware' => ['auth', 'role:local']], function () {
        // All routes you put here can be accessible to all authenticated users
        Route::get('/local', 'LocalController@index');
    });

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        
        // Rutas de REPUESTOS
        Route::get('/admin', 'AdminController@index');
        Route::get('/admin/parts', 'AdminController@index');
        Route::get('/admin/parts/category/{id}', 'AdminController@partsCategory');
        Route::get('/admin/part/create', 'AdminController@createPart');
        Route::post('/admin/part', 'AdminController@storePart');
        Route::get('/qr', 'AdminController@qr');

        // Rutas de CATEGORIAS
        Route::post('/admin/categories', 'AdminController@index');
        //
        Route::get('/admin/category', 'AdminController@listCategory');
        Route::get('/admin/categoryList', 'AdminController@indexCategory');
        Route::post('/admin/category', 'AdminController@storeCategory');
        Route::delete('/admin/category/{id}', 'AdminController@destroyCategory');
        //RUTAS de MARCAS
        Route::get('/admin/brand', 'AdminController@listBrand');
        Route::get('/admin/brandList', 'AdminController@indexBrand');
        Route::post('/admin/brand', 'AdminController@storeBrand');
        Route::delete('/admin/brand/{id}', 'AdminController@destroyBrand');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
