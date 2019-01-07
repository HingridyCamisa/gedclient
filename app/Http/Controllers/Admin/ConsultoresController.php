<?php

namespace App\Http\Controllers\Admin;

use App\Consultor;
use App\Http\Requests\ConsultorRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ConsultoresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultor = Consultor::latest()->paginate(12);

        return view('admin.consultor.index',compact ('consultor',$consultor))->with('i', (request()->input('page', 1) - 1) *10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.consultor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultorRequest $request)
    {
        
       $consultor = new Consultor();
       $consultor->nome_consultor = $request->input('nome_consultor');
       $consultor->email_consultor = $request->input('email_consultor');
       $consultor->telefone_consultor = $request->input('telefone_consultor'); 
       $consultor->data_nascimento = $request->input('data_nascimento');
       $consultor->save();

       return redirect('/admin/consultor/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function show(Consultor $consultor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultor $consultor, $id)
    {
        $consultor = Consultor::findorFail($id);

        return view('admin.consultor.edit', compact('consultor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultor $consultor, $id)
    {
        $consultor = Consultor::find($id);
        $consultor->nome_consultor = $request->input('nome_consultor');
        $consultor->email_consultor = $request->input('email_consultor');
        $consultor->telefone_consultor = $request->input('telefone_consultor'); 
        $consultor->data_nascimento = $request->input('data_nascimento');
        $consultor->save();
 
        return redirect('/admin/consultor/index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultor  $consultor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultor $consultor, $id)
    {
        $consultor= \App\Consultor::find($id);
        $consultor->delete();

        return redirect('/admin/consultor/index');
    }

}
