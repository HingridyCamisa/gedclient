<?php

namespace App\Http\Controllers\Admin;

use App\Seguradora;
use App\TipoSeguro;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeguradoraRequest;

class SeguradorasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $seguradoras = Seguradora::all();

         $seguradoras = \App\Seguradora::latest()->paginate(12);

        return view('admin.seguradoras.index',compact('seguradoras'))->with('i',(request()->input('page', 1) -1) *12);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seguradoras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguradoraRequest $request)
    {
        //dd($request->all());

 
       $seguradoras = new Seguradora();
       $seguradoras->nome_seguradora = $request->input('nome_seguradora');
       $seguradoras->endereco_seguradora = $request->input('endereco_seguradora');
       $seguradoras->contacto_seguradora = $request->input('contacto_seguradora');
       $seguradoras->email_seguradora = $request->input('email_seguradora');
       $seguradoras->tipo_seguro = $request->input('tipo_seguro');
       $seguradoras->gestor = $request->input('gestor');
       $seguradoras->gestor_contacto = $request->input('gestor_contacto');
       $seguradoras->gestor_email = $request->input('gestor_email');
       $seguradoras->save();

       return redirect('/admin/seguradoras/index');

   
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function show(Seguradora $seguradora, $id)
    {
        $tipo_seguro = TipoSeguro::all();
        $seguradora = \App\Seguradora::findOrFail($id);

        return view('admin.seguradoras.show',compact('seguradora','tipo_seguro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function edit(Seguradora $seguradora, $id)
    {
        $seguradora = \App\Seguradora::findOrFail($id);

        return view('admin.seguradoras.edit',compact('seguradora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seguradora $seguradora, $id)
    {
        $seguradoras = Seguradora::find($id);
        $seguradoras->nome_seguradora = $request->input('nome_seguradora');
        $seguradoras->endereco_seguradora = $request->input('endereco_seguradora');
        $seguradoras->contacto_seguradora = $request->input('contacto_seguradora');
        $seguradoras->email_seguradora = $request->input('email_seguradora');
        $seguradoras->tipo_seguro = $request->input('tipo_seguro');
        $seguradoras->gestor = $request->input('gestor');
        $seguradoras->gestor_contacto = $request->input('gestor_contacto');
        $seguradoras->gestor_email = $request->input('gestor_email');
        $seguradoras->save();
 
        return redirect('/admin/seguradoras/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seguradora  $seguradora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seguradora $seguradora, $id)
    {
        $seguradora= \App\Seguradora::find($id);
        $seguradora->delete();

        return redirect('/admin/seguradoras/index');
    }
}
