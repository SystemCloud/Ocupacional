<?php
Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//Rutas para perfiles
Route::get('/miPirfel','PerfilController@index');
Route::get('/miPirfel.changePassword','PerfilController@password');
Route::put('/perfil.update','PerfilController@update');

//RUTAS PARA CLINICAS
Route::resource('/clinicas','ClinicasController');
