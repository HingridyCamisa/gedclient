<?php

use App\Calendario;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Voyager::routes();
    
    Route::get('calendario','CalendarioController@index')->name('admin.calendario');

    Route::post('calendario','CalendarioController@addEvent')->name('calendario.add');

    Route::get('calendario/detalhes/{id}','CalendarioController@show');

    Route::post('calendario/detalhes/update/{id}','CalendarioController@edit');

    Route::get('calendario/delete/{id}','CalendarioController@destroy');
    
    Route::get('metas','MetaController@index')->name('admin.metas');

    Route::get('seguradoras','SeguradorasController@index')->name('seguradora.index');

    Route::get('seguradoras','SeguradorasController@create')->name('seguradora.create');

    Route::post('seguradoras','SeguradorasController@store')->name('seguradora.store');

    Route::delete('seguradoras/destroy/{id}','SeguradorasController@destroy')->name('seguradora.destroy');

    Route::get('seguradoras/{id}/edit','SeguradorasController@edit')->name('seguradora.edit');

    Route::post('seguradoras/update/{id}','SeguradorasController@update')->name('seguradora.update');
    
    Route::get('home','AdminController@index')->name('admin.home');

    Route::post('seguradoras','SeguradorasController@store')->name('seguradora.store');
    
    Route::get('seguradoras/index','SeguradorasController@index')->name('seguradora.index');

    Route::get('seguradoras/show/{id}', 'SeguradorasController@show')->name('seguradora.show');

    Route::get('prospecoes/index','ProspecoesController@index')->name('prospecoes.index');

    Route::get('prospecoes/{id}','ProspecoesController@create')->name('prospecoes.create');

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
    Route::get('contrato/expira','ContratoController@expira')->name('contratos.expira');
    Route::post('contratos/expira/filtro','ContratoController@expiraFiltro');

    Route::get('contrato','ContratoController@create')->name('contratos.create');

    Route::get('contrato/{id}','ContratoController@create')->name('contratos.create');

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

    Route::get('ramo/index','RamoController@index')->name('ramo.index');

    Route::get('ramo','RamoController@create')->name('ramo.create');

    Route::post('ramo','RamoController@store')->name('ramo.store');

    Route::delete('ramo/destroy/{id}','RamoController@destroy')->name('ramo.destroy');

    Route::get('saude/index','SaudeController@index')->name('saudes.index');
    Route::get('saude/expira','SaudeController@expira')->name('saudes.expira');
    Route::post('saude/expira/filtro','ContratoController@expiraFiltro');

    Route::get('saude/{id}','SaudeController@create')->name('saude.create');

    Route::post('saude','SaudeController@store')->name('saude.store');

    Route::get('saude/show/{id}', 'SaudeController@show')->name('saude.show');

    Route::delete('saude/destroy/{id}', 'SaudeController@destroy')->name('saude.destroy');

    Route::get('saude/{id}/edit', 'SaudeController@edit')->name('saude.edit');

    Route::post('saude/update/{id}', 'SaudeController@update')->name('saude.update');

    Route::get('aniversarios/index','AniversarioController@index')->name('aniversarios.index');

    Route::get('metas/index','MetaController@index')->name('metas.index');
    //comentarios 
    Route::get('allcomments','ComentariosController@allcomments')->name('allcomments');

    Route::post('comentsave','ComentariosController@comentsave')->name('comentsave');

    Route::get('email/{id}/{source}', 'EmailController@index');
    Route::get('email/all', 'EmailController@all');
    Route::get('email/allsource', 'EmailController@allsource');

    Route::get('emailtry/{id}', 'EmailController@try');
    
    Route::post('enviaremail', 'EmailController@enviaremail');

    
    

    //clientes 
    Route::resource('clientes','ClientesController');
    Route::get('clientes/delete/{id}','ClientesController@destroy')->name('clientes/delete');
    Route::get('clientes/show/{id}','ClientesController@show')->name('clientes/show');
    Route::get('getdataClientes','ClientesController@getdataClientes');
    Route::post('clientes/atualizar/{id}','ClientesController@update');
    //states
    Route::get('get-state-list','ClientesController@getStateList');
    Route::get('get-city-list','ClientesController@getCityList');
    //aviso de cobranca
    Route::get('aviso-de-cobranca/{tipo}/{id}/{token_id}','AvisoDeCobrancaController@aviso');
    Route::get('gerar-aviso-de-cobranca/{tipo}/{contrato}/{cliente}/{numero}/{valor_a_pagar}/{data_inicial}/{data}/{denominador}','AvisoDeCobrancaController@gerar_aviso_de_cobranca');
    Route::get('avisode-cobranca-view/{tipo}/{contrato_token_id}/{token_id}','AvisoDeCobrancaController@avisoview')->name('avisode-cobranca-view');
    Route::get('avisode-cobranca-view-all/{tipo}/{contrato_token_id}/{token_id}','AvisoDeCobrancaController@avisoviewall')->name('avisode-cobranca-view-all');
    Route::get('aviso/destroy/{tipo}/{contrato_token_id}/{token_id}/{id}','AvisoDeCobrancaController@destroy');
    Route::get('aviso/approver/{id}','AvisoDeCobrancaController@approver');
    Route::get('aviso/expira','AvisoDeCobrancaController@expira');  
    Route::get('aviso/a-notificar','AvisoDeCobrancaController@aNotificar'); 
    Route::get('aviso/vencidos-nao-pagos','AvisoDeCobrancaController@vencidos_n_pagos'); 
    //index
    Route::get('avisode-cobranca-index', 'AvisoDeCobrancaController@index')->name('avisode-cobranca-index');
    //showContratoViaAviso
    Route::get('showContratoViaAviso/{id}','AvisoDeCobrancaController@showContratoViaAviso');
    Route::get('financas/avisoViaTableAvisos/{id}','AvisoDeCobrancaController@avisoViaTableAvisos');
    
    Route::get('financas','FinancasController@index');
    Route::DELETE('financas/destroy/{id}','FinancasController@destroy');

    //pagamentos
    Route::post('savepaymat','FinancasController@savepaymat');
    Route::post('savesituacao','FinancasController@savesituacao');

    //recibos 
     Route::get('recibostable','FinancasController@recibostable');
     Route::DELETE('financas/recibos/destroy/{id}','FinancasController@destroyrecibos');
     Route::DELETE('financas/recibos/destroy/db/{id}','FinancasController@destroyrecibosdifinito');
     Route::get('financas/recibos/recibo/{token_id}','FinancasController@extratrecibo');
     Route::get('financas/recibos/recibo/pdf/{token_id}','FinancasController@extratrecibopdf');

     //extrato do cliente
     Route::get('clientes/financas/extrato/{id}','FinancasController@extratoCliente');

     //files 
     Route::get('files/anexos/{token_id}','FileController@show');
     //remover anexo form a
    Route::get('/remove-anexo/{anexo}', 'FileController@removeanexo')->name('remove-anexo');
    //Route::post('/remove-anexo/{anexo}', 'FileController@removeanexo')->name('remove-anexo');
    Route::post('/files/addfiles/{token_id}','FileController@addfiles');

    Route::get('report/index','ReportController@index');
    Route::get('report/new','ReportController@new');
    Route::resource('meusficheiros','ReportController');
    Route::get('meusficheiros/deletefile/{file}','ReportController@deletefile');
    Route::get('meusficheiros/all/deletefile','ReportController@alldeletefile');
    Route::get('file/download/{filename}', 'FileDownloadController@index')->name('file/download');
    Route::post('report/filtro','ReportController@filtro');
    Route::get('financas/seguradora/{token}/{name}/{id}','FinancasController@seguradora');
    Route::get('aviso/pdf/{tipo}/{contrato_token_id}/{token_id}/{id}','AvisoDeCobrancaController@avisoPDF');
    Route::get('aviso/pdf/all/{tipo}/{contrato_token_id}/{token_id}/{id}','AvisoDeCobrancaController@avisoPDFAll');


});

Route::get('/', function(){
    return view('auth.login');
});





 
Route::get('/','Sistema\SistemaController@index')->name('home');


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


//email sender
Route::get('sendemail', function () {
     $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('notification', $data, function ($message) {

        $message->to('nhacudimaemidio@gmail.com')->subject('Learning Laravel test email');

    });
    return "Your email has been sent successfully";

});
