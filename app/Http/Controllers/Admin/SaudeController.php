<?php

namespace App\Http\Controllers\Admin;

use App\Saude;
use App\Seguradora;
use App\Consultor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaudeRequest;
use Carbon\Carbon;

class SaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $saude = Saude::latest()->paginate(12);
        return view('admin.saude.index',compact('saude'))->with('i', (request()->input('page', 1) -1) * 12);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saudes = Saude::all();
        $consultor = Consultor::all();
        $seguradora = Seguradora::all();
        return view('admin.saude.create',compact('saudes','seguradora','consultor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaudeRequest $request)
    {
        $saudes = new Saude();
        $saudes->nome_segurado = $request->input('nome_segurado');
        $saudes->data_nascimento = $request->input('data_nascimento');
        $saudes->idade = $request->input('idade');
        $saudes->ano_nascimento = $request->input('ano_nascimento');
        $saudes->contacto = $request->input('contacto');
        $saudes->email = $request->input('email');
        $saudes->tipo_segurado = $request->input('tipo_segurado');
        $saudes->pessoa_contacto = $request->input('pessoa_contacto');
        $saudes->email_pessoa_contacto = $request->input('email_pessoa_contacto');
        $saudes->contacto_pessoa_contacto = $request->input('contacto_pessoa_contacto');
        $saudes->seguradora = $request->input('seguradora');
        $saudes->plano = $request->input('plano');
        $saudes->nome_grupo = $request->input('nome_grupo');
        $saudes->tipo_membro = $request->input('tipo_membro');
        $saudes->numero_membro = $request->input('numero_membro');
        $saudes->data_inicio_cobertura = $request->input('data_inicio_cobertura');
        $saudes->data_fim_cobertura = $request->input('data_fim_cobertura');
        $saudes->periodicidade_pagamento = $request->input('periodicidade_pagamento');
        $saudes->premio_mensal = $request->input('premio_mensal');
        $saudes->taxa_corretagem = $request->input('taxa_corretagem');
        $saudes->comissao = $request->input('comissao');
        $saudes->situacao = $request->input('situacao');
        $saudes->save();
 
        return redirect('/admin/saude/index');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function show(Saude $saude, $id)
    {
        $saude = Saude::findOrFail($id);

        return view('admin.saude.show',compact('saude'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function edit(Saude $saude, $id)
    {
        $consultors = Consultor::all();
        $seguradora = Seguradora::all();
        $saude = Saude::findOrFail($id);

        return view('admin.saude.edit',compact('seguradora','consultors','saude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saude $saude, $id)
    {
        $saudes = Saude::findOrFail($id);
        $saudes->nome_segurado = $request->input('nome_segurado');
        $saudes->data_nascimento = $request->input('data_nascimento');
        $saudes->idade = $request->input('idade');
        $saudes->ano_nascimento = $request->input('ano_nascimento');
        $saudes->contacto = $request->input('contacto');
        $saudes->email = $request->input('email');
        $saudes->tipo_segurado = $request->input('tipo_segurado');
        $saudes->pessoa_contacto = $request->input('pessoa_contacto');
        $saudes->email_pessoa_contacto = $request->input('email_pessoa_contacto');
        $saudes->contacto_pessoa_contacto = $request->input('contacto_pessoa_contacto');
        $saudes->seguradora = $request->input('seguradora');
        $saudes->plano = $request->input('plano');
        $saudes->nome_grupo = $request->input('nome_grupo');
        $saudes->tipo_membro = $request->input('tipo_membro');
        $saudes->numero_membro = $request->input('numero_membro');
        $saudes->data_inicio_cobertura = $request->input('data_inicio_cobertura');
        $saudes->data_fim_cobertura = $request->input('data_fim_cobertura');
        $saudes->periodicidade_pagamento = $request->input('periodicidade_pagamento');
        $saudes->premio_mensal = $request->input('premio_mensal');
        $saudes->taxa_corretagem = $request->input('taxa_corretagem');
        $saudes->comissao = $request->input('comissao');
        $saudes->situacao = $request->input('situacao');
        $saudes->save();
 
        return redirect('/admin/saude/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saude $saude, $id)
    {
        $saude= \App\Saude::find($id);
        $saude->delete();

        return redirect('/admin/saude/index');

    }
}
