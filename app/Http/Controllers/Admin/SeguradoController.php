<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Segurado;
use App\Consultor;
use App\Seguradora;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeguradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->name;
        $segurados = \App\Segurado::latest()->paginate(5000);

        return view('admin.segurados.index',compact('segurados','user'))->with('i',(request()->input('page', 1) -1) *12);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $segurados = Segurado::all();
        $sconsultor = Consultor::all();
        $seguradoras = Seguradora::all();
        return view('admin.segurados.create',compact('consultor','seguradoras','segurados'));
        // return view('admin.segurados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $segurados = new Segurado();
        $segurados->nome_segurado = $request->input('nome_segurado');
        $segurados->data_nascimento = $request->input('data_nascimento');
        $segurados->genero_segurado = $request->input('genero_segurado');
        $segurados->morada_seguardo = $request->input('morada_seguardo');
        $segurados->contacto_segurado = $request->input('contacto_segurado');
        $segurados->dependentes = $request->input('dependentes');
        $segurados->nome_consultor = $request->input('nome_consultor');
        $segurados->nome_seguradora = $request->input('nome_seguradora');
        $segurados->save();

        return redirect('/admin/segurados/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segurado  $segurado
     * @return \Illuminate\Http\Response
     */
    public function show(Segurado $segurado, $id)
    {
        $segurado = Segurado::findOrFail($id);

        return view('admin.segurados.show',compact('segurado'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Segurado  $segurado
     * @return \Illuminate\Http\Response
     */
    public function edit(Segurado $segurado, $id)
    {
        $segurado = Segurado::findOrFail($id);
        $consultor = Consultor::all();
        $seguradoras = Seguradora::all();
        
        return view('admin.segurados.edit',compact('consultor','seguradoras','segurado'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Segurado  $segurado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Segurado $segurado, $id)
    {
        $segurados = Segurado::findOrFail($id);
        $segurados->nome_segurado = $request->input('nome_segurado');
        $segurados->data_nascimento = $request->input('data_nascimento');
        $segurados->genero_segurado = $request->input('genero_segurado');
        $segurados->morada_seguardo = $request->input('morada_seguardo');
        $segurados->contacto_segurado = $request->input('contacto_segurado');
        $segurados->dependentes = $request->input('dependentes');
        $segurados->nome_consultor = $request->input('nome_consultor');
        $segurados->nome_seguradora = $request->input('nome_seguradora');
        $segurados->save();

        return redirect('/admin/segurados/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segurado  $segurado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segurado $segurado)
    {
        //
    }
}
