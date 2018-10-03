<?php

namespace App\Http\Controllers;

use App\AcidenteTrabalho;
use Illuminate\Http\Request;

class AcidenteTrabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acidentetrabalhos = AcidenteTrabalho::all();

        return view('acidentetrabalho.index',['acidentetrabalhos' => $acidentetrabalhos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acidentetrabalho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $acidenteTrabalho = new AcidenteTrabalho;
        $acidenteTrabalho->nome_empresa = $request->nome_empresa;
        $acidenteTrabalho->localizacao_empresa = $request->localizacao_empresa;
        $acidenteTrabalho->contacto_empresa = $request->contacto_empresa;
        $acidenteTrabalho->email_empresa = $request->email_empresa;
        $acidenteTrabalho->volume_salarial_anual = $request->volume_salarial_anual;
        $acidenteTrabalho->save();

        return redirect('acidentetrabalho.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcidenteTrabalho  $acidenteTrabalho
     * @return \Illuminate\Http\Response
     */
    public function show(AcidenteTrabalho $acidenteTrabalho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcidenteTrabalho  $acidenteTrabalho
     * @return \Illuminate\Http\Response
     */
    public function edit(AcidenteTrabalho $acidenteTrabalho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcidenteTrabalho  $acidenteTrabalho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcidenteTrabalho $acidenteTrabalho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcidenteTrabalho  $acidenteTrabalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcidenteTrabalho $acidenteTrabalho)
    {
        //
    }
}
