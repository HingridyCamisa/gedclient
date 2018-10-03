<?php

namespace App\Http\Controllers;

use App\TipoSeguro;
use Illuminate\Http\Request;

class TipoSegurosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_seguros = \App\TipoSeguro::latest()->paginate(10);

        return view('admin.seguradoras.index',compact('seguradoras'))->with('i',(request()->input('page', 1) -1) *10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function show(TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoSeguro $tipoSeguro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoSeguro  $tipoSeguro
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoSeguro $tipoSeguro)
    {
        //
    }
}
