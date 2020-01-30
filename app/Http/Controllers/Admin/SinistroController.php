<?php

namespace App\Http\Controllers\Admin;

use App\Sinistro;
use App\Seguradora;
use App\Consultor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinistroController extends Controller
{


      protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('sinostros');

        $sinistros = \App\Sinistro::latest()->paginate(12);

        return view('admin.sinistro.index',compact('sinistros'))->with('i',(request()->input('page', 1) -1) *12);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $this->authorize('sinostros_create');
        $seguradoras = Seguradora::all();
        $consultor = Consultor::all();
        return view ('admin.sinistro.create',compact('seguradoras','consultor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->authorize('sinostros_create');
        $sinistro = new Sinistro();
        $sinistro->sinistro = $request->input('sinistro');
        $sinistro->seguradora = $request->input('seguradora');
        $sinistro->numero_apolice = $request->input('numero_apolice');
        $sinistro->nome_segurado = $request->input('nome_segurado');
        $sinistro->seguradora = $request->input('seguradora');
        $sinistro->data_sinistro = $request->input('data_sinistro');
        $sinistro->data_participacao_almond = $request->input('data_participacao_almond');
        $sinistro->data_participacao_seguradora = $request->input('data_participacao_seguradora');
        $sinistro->situacao = $request->input('situacao');
        $sinistro->data_pagamento = $request->input('data_pagamento');
        $sinistro->numero_dias = $request->input('numero_dias');
        $sinistro->valor_sinistro = $request->input('valor_sinistro');
        $sinistro->valor_pago_seguradora = $request->input('valor_pago_seguradora');
        $sinistro->franquia = $request->input('franquia');
        $sinistro->valor_franquia = $request->input('valor_franquia');
        $sinistro->detalhes = $request->input('detalhes');
        $sinistro->consultor = $request->input('consultor');
        $sinistro->save();

        return redirect('/admin/sinistro/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sinistro  $sinistro
     * @return \Illuminate\Http\Response
     */
    public function show(Sinistro $sinistro, $id)
    {
    $this->authorize('sinostros_show');
        $sinistros = Sinistro::findOrFail($id);

        return view('admin.sinistro.show',compact('sinistros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sinistro  $sinistro
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinistro $sinistro, $id)
    {   $this->authorize('sinostros_edit');
        $sinistros = Sinistro::findOrFail($id);
        $consultor = Consultor::all();
        $seguradoras = Seguradora::all();

        return view('admin.sinistro.edit', compact('sinistros','consultor','seguradoras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sinistro  $sinistro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinistro $sinistro, $id)
    {   $this->authorize('sinostros_edit');

        $sinistros = Sinistro::findOrFail($id);
        $sinistro->sinistro = $request->input('sinistro');
        $sinistro->seguradora = $request->input('seguradora');
        $sinistro->numero_apolice = $request->input('numero_apolice');
        $sinistro->nome_segurado = $request->input('nome_segurado');
        $sinistro->seguradora = $request->input('seguradora');
        $sinistro->data_sinistro = $request->input('data_sinistro');
        $sinistro->data_participacao_almond = $request->input('data_participacao_almond');
        $sinistro->data_participacao_seguradora = $request->input('data_participacao_seguradora');
        $sinistro->situacao = $request->input('situacao');
        $sinistro->data_pagamento = $request->input('data_pagamento');
        $sinistro->numero_dias = $request->input('numero_dias');
        $sinistro->valor_sinistro = $request->input('valor_sinistro');
        $sinistro->valor_pago_seguradora = $request->input('valor_pago_seguradora');
        $sinistro->franquia = $request->input('franquia');
        $sinistro->valor_franquia = $request->input('valor_franquia');
        $sinistro->detalhes = $request->input('detalhes');
        $sinistro->consultor = $request->input('consultor');
        $sinistro->save();

        return redirect('/admin/sinistro/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sinistro  $sinistro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinistro $sinistro, $id)
    {   $this->authorize('sinostros_destroy');
        $sinistro = \App\Sinistro::find($id);
        $sinistro->delete();

        return redirect('/admin/sinistro/index');
    }
}
