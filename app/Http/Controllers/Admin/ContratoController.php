<?php

namespace App\Http\Controllers\Admin;

use App\Seguradora;
use App\TipoSeguro;
use App\Consultor;
use App\Contrato;
use App\Prospecao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::latest()->leftjoin('prospecaos','contratos.id_prospecaos','prospecaos.id')
                                       ->select('contratos.*','prospecaos.nome_cliente','prospecaos.nome_consultor')
                                       ->paginate(12);


        return view('admin.contrato.index',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrato = Contrato::all();
        $seguradora = Seguradora::all();
        $tipo_seguro = TipoSeguro::all();
        $consultor = Consultor::all();

        return view('admin.contrato.create',compact('contrato','seguradora','tipo_seguro','consultor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrato = new Contrato();
        $contrato->nome_segurado = $request->input('nome_segurado');
        $contrato->nome_seguradora = $request->input('nome_seguradora');
        $contrato->tipo_seguro = $request->input('tipo_seguro');
        $contrato->numero_apolice = $request->input('numero_apolice');
        $contrato->numero_recibo = $request->input('numero_recibo');
        $contrato->periodicidade_pagamento = $request->input('periodicidade_pagamento');
        $contrato->data_inicio = $request->input('data_inicio');
        $contrato->data_proximo_pagamento = $request->input('data_proximo_pagamento');
        $contrato->dias_cobertos = $request->input('dias_cobertos');
        $contrato->dias_proximo_pagamento = $request->input('dias_proximo_pagamento');
        $contrato->capital_seguro = $request->input('capital_seguro');
        $contrato->premio_total = $request->input('premio_total');
        $contrato->premio_simples = $request->input('premio_simples');
        $contrato->taxa_corretagem = $request->input('taxa_corretagem');
        $contrato->comissao = $request->input('comissao');
        $contrato->item_segurado = $request->input('item_segurado');
        $contrato->situacao = $request->input('situacao');
        $contrato->consultor = $request->input('consultor');
        $contrato->detalhes_item_segurado = $request->input('detalhes_item_segurado');
        $contrato->tipo_cliente = $request->input('tipo_cliente');
        $contrato->data_nascimento = $request->input('data_nascimento');
        $contrato->genero = $request->input('genero');
        $contrato->endereco = $request->input('endereco');
        $contrato->pessoa_contacto = $request->input('pessoa_contacto');
        $contrato->email_pessoa_contacto = $request->input('email_pessoa_contacto');
        $contrato->contacto_pessoa_contacto = $request->input('contacto_pessoa_contacto');
        $contrato->ramo_negocio = $request->input('ramo_negocio');
        $contrato->save();

        return redirect('/admin/contrato/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato, $id)
    {
        $contrato = Contrato::findOrFail($id);

        return view('admin.contrato.show',compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato, $id)
    {
        $seguradora = Seguradora::all();
        $consultor = Consultor::all();
        $tipo_seguro = TipoSeguro::all();
        $contrato = Contrato::findOrFail($id);

        return view('admin.contrato.edit',compact('contrato','seguradora','consultor','tipo_seguro'));
    }

    public function tornarcontrato(Request $request)
    { 
       
       
        /*$contrato = new Contrato;

        $contrato->nome_segurado = $request->input('nome_segurado');
        $contrato->nome_seguradora = $request->input('nome_seguradora');
        $contrato->tipo_seguro = $request->input('tipo_seguro');
        $contrato->numero_apolice = $request->input('numero_apolice');
        $contrato->numero_recibo = $request->input('numero_recibo');
        $contrato->periodicidade_pagamento = $request->input('periodicidade_pagamento');
        $contrato->data_inicio = $request->input('data_inicio');
        $contrato->data_proximo_pagamento = $request->input('data_proximo_pagamento');
        $contrato->dias_cobertos = $request->input('dias_cobertos');
        $contrato->dias_proximo_pagamento = $request->input('dias_proximo_pagamento');
        $contrato->capital_seguro = $request->input('capital_seguro');
        $contrato->premio_total = $request->input('premio_total');
        $contrato->premio_simples = $request->input('premio_simples');
        $contrato->taxa_corretagem = $request->input('taxa_corretagem');
        $contrato->comissao = $request->input('comissao');
        $contrato->item_segurado = $request->input('item_segurado');
        $contrato->situacao = $request->input('situacao');
        $contrato->consultor = $request->input('consultor');
        $contrato->detalhes_item_segurado = $request->input('detalhes_item_segurado');
        $contrato->tipo_cliente = $request->input('tipo_cliente');
        $contrato->data_nascimento = $request->input('data_nascimento');
        $contrato->genero = $request->input('genero');
        $contrato->endereco = $request->input('endereco');
        $contrato->pessoa_contacto = $request->input('pessoa_contacto');
        $contrato->email_pessoa_contacto = $request->input('email_pessoa_contacto');
        $contrato->contacto_pessoa_contacto = $request->input('contacto_pessoa_contacto');
        $contrato->ramo_negocio = $request->input('ramo_negocio');
        dd($contrato);
        
        $contrato->save();*/

        $prospecao=Prospecao::find($request->id_prospecaos);
        $prospecao->status=0;
        $prospecao->save();

        $data=$request->all();
        $data["nome_segurado"]=$prospecao->nome_cliente;
        $data["consultor"]=$prospecao->nome_consultor;
        $data["ramo_negocio"]=$prospecao->tipo_prospecao;

        //dd($data["nome_seguradora"]=5);
        Contrato::create($data);
        
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato, $id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->nome_segurado = $request->input('nome_segurado');
        $contrato->nome_seguradora = $request->input('nome_seguradora');
        $contrato->tipo_seguro = $request->input('tipo_seguro');
        $contrato->numero_apolice = $request->input('numero_apolice');
        $contrato->numero_recibo = $request->input('numero_recibo');
        $contrato->periodicidade_pagamento = $request->input('periodicidade_pagamento');
        $contrato->data_inicio = $request->input('data_inicio');
        $contrato->data_proximo_pagamento = $request->input('data_proximo_pagamento');
        $contrato->dias_cobertos = $request->input('dias_cobertos');
        $contrato->dias_proximo_pagamento = $request->input('dias_proximo_pagamento');
        $contrato->capital_seguro = $request->input('capital_seguro');
        $contrato->premio_total = $request->input('premio_total');
        $contrato->premio_simples = $request->input('premio_simples');
        $contrato->taxa_corretagem = $request->input('taxa_corretagem');
        $contrato->comissao = $request->input('comissao');
        $contrato->item_segurado = $request->input('item_segurado');
        $contrato->situacao = $request->input('situacao');
        $contrato->consultor = $request->input('consultor');
        $contrato->detalhes_item_segurado = $request->input('detalhes_item_segurado');
        $contrato->tipo_cliente = $request->input('tipo_cliente');
        $contrato->data_nascimento = $request->input('data_nascimento');
        $contrato->genero = $request->input('genero');
        $contrato->endereco = $request->input('endereco');
        $contrato->pessoa_contacto = $request->input('pessoa_contacto');
        $contrato->email_pessoa_contacto = $request->input('email_pessoa_contacto');
        $contrato->contacto_pessoa_contacto = $request->input('contacto_pessoa_contacto');
        $contrato->ramo_negocio = $request->input('ramo_negocio');
        $contrato->save();

        return redirect('/admin/contrato/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato, $id)
    {
        $contrato= \App\Contrato::find($id);
        $contrato->delete();

        return redirect('/admin/contrato/index');
    }
}
