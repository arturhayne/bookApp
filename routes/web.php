<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('appointments/{token}/{date}/{param}','AppointmentsController@showFreeSlots');
Route::post('appointments/{token}/{date}/{time}/{patient}','AppointmentsController@markit');
Route::delete('appointments/{token}/{appointmentId}','AppointmentsController@deleteAppointment');

Route::get('/', function () {
    return view('welcome');
});
