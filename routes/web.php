<?php

use App\Calendario;


$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    
    $this->get('calendario','CalendarioController@index')->name('admin.calendario');

    $this->post('calendario','CalendarioController@addEvent')->name('calendario.add');

    $this->get('metas','MetaController@index')->name('admin.metas');

    $this->get('seguradoras','SeguradorasController@index')->name('seguradora.index');

    $this->get('seguradoras','SeguradorasController@create')->name('seguradora.create');

    $this->post('seguradoras','SeguradorasController@store')->name('seguradora.store');

    $this->delete('seguradoras/destroy/{id}','SeguradorasController@destroy')->name('seguradora.destroy');

    Route::get('seguradoras/{id}/edit','SeguradorasController@edit')->name('seguradora.edit');

    $this->post('seguradoras/update/{id}','SeguradorasController@update')->name('seguradora.update');
    
    $this->get('/','AdminController@index')->name('admin.home');

    Route::post('seguradoras','SeguradorasController@store')->name('seguradora.store');
    
    Route::get('seguradoras/index','SeguradorasController@index')->name('seguradora.index');

    Route::get('seguradoras/show/{id}', 'SeguradorasController@show')->name('seguradora.show');

    Route::get('prospecoes/index','ProspecoesController@index')->name('prospecoes.index');

    Route::get('prospecoes','ProspecoesController@create')->name('prospecoes.create');

    Route::post('prospecoes','ProspecoesController@store')->name('prospecoes.store');

    Route::delete('prospecoes/destroy/{id}','ProspecoesController@destroy')->name('prospecoes.destroy');

    Route::get('prospecoes/{id}/edit','ProspecoesController@edit')->name('prospecoes.edit');

    Route::post('prospecoes/update/{id}','ProspecoesController@update')->name('prospecoes.update');

    Route::get('prospecoes/show/{id}', 'ProspecoesController@show')->name('prospecoes.show');

    Route::get('consultor/index','ConsultoresController@index')->name('consultor.index');

    Route::delete('consultor/destroy/{id}', 'ConsultoresController@destroy')->name('consultor.destroy');

    Route::get('consultor','ConsultoresController@create')->name('consultor.create');

    Route::post('consultor','ConsultoresController@store')->name('consultor.store');

    Route::get('consultor/{id}/edit', 'ConsultoresController@edit')->name('consultor.edit');

    Route::post('consultor/update/{id}','ConsultoresController@update')->name('consultor.update');

    Route::get('consultor/pdf','ConsultoresController@export_pdf');

    Route::get('segurados/index','SeguradoController@index')->name('segurados.index');

    Route::post('segurados','SeguradoController@store')->name('segurados.store');

    Route::get('segurados','SeguradoController@create')->name('segurados.create');

    Route::get('segurados/{id}/edit','SeguradoController@edit')->name('segurados.edit');

    Route::post('segurados/update/{id}','SeguradoController@update')->name('segurados.update');

    Route::get('contrato/index','ContratoController@index')->name('contratos.index');

    Route::get('contrato','ContratoController@create')->name('contratos.create');

    Route::post('contrato','ContratoController@store')->name('contratos.store');

    Route::post('tornarcontrato','ContratoController@tornarcontrato')->name('tornarcontrato');

    Route::get('contrato/show/{id}','ContratoController@show')->name('contratos.show');

    Route::get('contrato/{id}/edit', 'ContratoController@edit')->name('contratos.edit');

    Route::post('contrato/update/{id}','ContratoController@update')->name('contratos.update');

    Route::delete('contrato/destroy/{id}', 'ContratoController@destroy')->name('contrato.destroy');

    Route::get('sinistro/index','SinistroController@index')->name('sinistros.index');

    Route::get('sinistro','SinistroController@create')->name('sinistros.create');

    Route::post('sinistro','SinistroController@store')->name('sinistros.store');

    Route::get('sinistro/show/{id}', 'SinistroController@show')->name('sinistros.show');

    Route::get('sinistro/{id}/edit', 'SinistroController@edit')->name('sinistros.edit');

    Route::post('sinistro/update/{id}', 'SinistroController@update')->name('sinistros.update');

    Route::delete('sinistro/destroy/{id}', 'SinistroController@destroy')->name('sinistros.destroy');

    Route::get('saude/index','SaudeController@index')->name('saudes.index');

    Route::get('saude','SaudeController@create')->name('saude.create');

    Route::post('saude','SaudeController@store')->name('saude.store');

    Route::get('saude/show/{id}', 'SaudeController@store')->name('saude.show');

});

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes();


 
$this->get('/','Sistema\SistemaController@index')->name('home');


//sms sender 
Route::get('/sms', function () {
    return view('sms.sms');
});//formulario de sms
Route::post('/enviarsms','SmsController@enviarsms');
Route::get('/bulcksms',function(){
	return view('sms.bulcksms');
});//formulario de bulck sms contactos
Route::post('/saveclient','BulckSmsController@saveclient');
Route::get('/messagebulcksms',function(){
return view('sms.messagebulcksms');
});//formulario de bulck sms messagem
Route::post('/savemessagen','BulckSmsController@savemessagen');
Route::get('/sendbulcksms','BulckSmsController@sendbulcksms');//formulario de envio de sms em bulck
Route::post('/sendsmsfinal','BulckSmsController@sendsmsfinal');
Route::get('chart','ChartController@index');
//and sender


