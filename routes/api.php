<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginJwtController;
use App\Http\Controllers\ApiController;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginJwtController@login')->name('login');
    Route::post('/logout', 'LoginJwtController@logout')->name('logout');
});

Route::group(['middleware' => ['jwt.auth']], function(){
    Route::get('lista-clientes','ApiController@listaClientes');
    Route::post('cliente-maior-compra','ApiController@maiorCompra');
    Route::post('lista-clientes-ncompras','ApiController@listaClientesCompras');
    Route::post('sugestao-cliente','ApiController@sugestaoCompra');
    Route::get('clientes','ApiController@getClientes');
    Route::get('anos-compra','ApiController@getAnoCompra');
});
