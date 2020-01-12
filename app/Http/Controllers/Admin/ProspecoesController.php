<?php

namespace App\Http\Controllers\Admin;

use App\Prospecao;
use App\Consultor;
use App\Seguradora;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProspecaoRequest;
use Carbon\Carbon;


class ProspecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguradora = Seguradora::all();
        $prospecaos = Prospecao::select('prospecaos.*','consultors.nome_consultor as consultor')
                                ->join('consultors','prospecaos.nome_consultor','consultors.id')
                                ->latest()
                                ->where('status','1')
                                ->paginate(12)
                                ;
                      

        $hoje = Carbon::today();
        

       return view('admin.prospecoes.index',compact('prospecaos','seguradora','hoje'))->with('i', (request()->input('page', 1) -1) * 12);
    }


    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $consultors = Consultor::all();
        return view('admin.prospecoes.create',compact('consultors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProspecaoRequest $request)
    {

       $prospecoes = new Prospecao();
       $prospecoes->nome_cliente = $request->input('nome_cliente');
       $prospecoes->nome_consultor = $request->input('nome_consultor');
       $prospecoes->tipo_cliente = $request->input('tipo_cliente');
       $prospecoes->endereco_cliente = $request->input('endereco_cliente');
       $prospecoes->contacto_cliente = $request->input('contacto_cliente');
       $prospecoes->pessoa_contacto = $request->input('pessoa_contacto');
       $prospecoes->email_cliente = $request->input('email_cliente');
       $prospecoes->data_inicio = $request->input('data_inicio');
       $prospecoes->data_prevista_fim = $request->input('data_prevista_fim');
       $prospecoes->tipo_prospecao = $request->input('tipo_prospecao');
       $prospecoes->origem_prospecao = $request->input('origem_prospecao');
       $prospecoes->valor_estipulado_carteira = $request->input('valor_estipulado_carteira');
       $prospecoes->detalhes_prospecao = $request->input('detalhes_prospecao');
       $prospecoes->estado = $request->input('estado');
       $prospecoes->save();

       return back()->with('success','Contrato criado com sucesso.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function show(Prospecao $prospecao, $id)
    {
        $prospecao = Prospecao::findOrFail($id);

        return view('admin.prospecoes.show',compact('prospecao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospecao $prospecao, $id)
    {
        $consultors = Consultor::all();
        $prospecao = Prospecao::findOrFail($id);

        return view('admin.prospecoes.edit',compact('prospecao','consultors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospecao $prospecao, $id)
    {
        $prospecoes =  Prospecao::findOrFail($id);
        $prospecoes->nome_cliente = $request->input('nome_cliente');
        $prospecoes->nome_consultor = $request->input('nome_consultor');
        $prospecoes->tipo_cliente = $request->input('tipo_cliente');
        $prospecoes->endereco_cliente = $request->input('endereco_cliente');
        $prospecoes->contacto_cliente = $request->input('contacto_cliente');
        $prospecoes->pessoa_contacto = $request->input('pessoa_contacto');
        $prospecoes->email_cliente = $request->input('email_cliente');
        $prospecoes->data_inicio = $request->input('data_inicio');
        $prospecoes->data_prevista_fim = $request->input('data_prevista_fim');
        $prospecoes->tipo_prospecao = $request->input('tipo_prospecao');
        $prospecoes->origem_prospecao = $request->input('origem_prospecao');
        $prospecoes->valor_estipulado_carteira = $request->input('valor_estipulado_carteira');
        $prospecoes->detalhes_prospecao = $request->input('detalhes_prospecao');
        $prospecoes->estado = $request->input('estado');
        $prospecoes->save();

        return redirect('/admin/prospecoes/index')->with('success','Editado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospecao $prospecao, $id)
    {
        $prospecao= \App\Prospecao::find($id);
        $prospecao->delete();

        return redirect('/admin/prospecoes/index');

    }
}
