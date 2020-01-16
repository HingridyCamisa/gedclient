<?php

namespace App\Http\Controllers\Admin;

use App\Seguradora;
use App\TipoSeguro;
use App\Consultor;
use App\Contrato;
use App\Prospecao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use carbon;
use Illuminate\Support\Str;
use App\Files;
use App\Cliente;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::where("contratos.status",1)
                                       ->latest()
                                       ->paginate(12);

        
        return view('admin.contrato.index',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
    }

    public function aviso()
    {
        return view('admin.contrato.aviso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $contrato = Contrato::all();
        $seguradora = Seguradora::all();
        $tipo_seguro = TipoSeguro::all();
        $consultor = Consultor::all();
        $cliente=Cliente::where('status',1)->where('id',$id)->first();

        return view('admin.contrato.create',compact('contrato','tipo_seguro','seguradora','consultor','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedata=$request->validate([
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        'nome_seguradora'=>'required',
        'numero_apolice'=>'required|string|min:3|max:100',
        'numero_recibo'=>'required|string|min:3|max:100',
        'periodicidade_pagamento'=>'required|string',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'required|date',
        'capital_seguro'=>'required|numeric|min:1',
        'premio_total'=>'required|numeric|min:1',
        'premio_simples'=>'required|numeric|min:1',
        'taxa_corretagem'=>'required|numeric',
        'comissao'=>'required|numeric|min:1',
        'item_segurado'=>'required|numeric|min:1',
        'situacao'=>'required|string',
        'consultor'=>'required|string',
        'detalhes_item_segurado'=>'required|string',
        'tipo_ramo'=>'required|string',
        'user_id'=>'required',
        'client_id' =>'required',
        'client_token' => 'required',


       ]);
       
       //file name
        $namefile = Str::random(32).'anexo'.time();

        $data=$request->all();
        unset($data['filetype']);//remove time from array before save
        unset($data['file']);//remove time from array before save
        $data["token_id"]=$namefile;

        
        Contrato::create($data);

        //storag file
        foreach($request->file('file') as $key=>$file)
        {
            $origname=$file->getClientOriginalName();
            $name=$origname . time() . '-'.$key.'.'. $file->getClientOriginalExtension();
            $file->storeAs('anexos', $name);
            $file= new Files();
            $file->filename=$name;
            $file->token_id=$namefile;
            $file->filetype=$request->filetype[$key];
            $file->save();

        }

        return redirect('/admin/contrato/index')->with('success','Contrato criado.');
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

        return view('admin.contrato.edit',compact('contrato','seguradora','consultor','tipo_seguro'))->with('success','Contrato editado.');
    }

    public function tornarcontrato(Request $request)
    { 

       $validatedata=$request->validate([
        'id_prospecaos'=>'required',
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        'data_inicio'=>'required|date',
        'dias_cobertos'=>'required|numeric',
        'dias_proximo_pagamento'=>'required|date',
        'capital_seguro'=>'required|numeric',
        'premio_total'=>'required|numeric',
        'premio_simples'=>'required|numeric',
        'taxa_corretagem'=>'required|numeric',
        'comissao'=>'required|numeric',
        'periodicidade_pagamento'=>'required',
        'situacao'=>'required',
        'item_segurado'=>'required',
       ]);
       
       //file name
        $namefile = Str::random(32).'anexo'.time();

        $prospecao=Prospecao::where('status',1)->where('id',$request->id_prospecaos)->first();
        if (!$prospecao)
        {
        	return back()->with('error','Prospenção desativada');
        };
        
       
      
        $prospecao->status=0;
        $prospecao->save();

        $data=$request->all();
        unset($data['filetype']);//remove time from array before save
        unset($data['file']);//remove time from array before save
        $data["client_token"]=$prospecao->client_token;
        $data["client_id"]=$prospecao->client_id;
        $data["tipo_ramo"]=$prospecao->tipo_ramo;
        $data["id_prospecaos"]=$request->id_prospecaos;
        $data["consultor"]=$prospecao->nome_consultor;
        $data["detalhes_item_segurado"]=$prospecao->detalhes_prospecao;
        $data["token_id"]=$namefile;

        
        Contrato::create($data);

        //storag file
        foreach($request->file('file') as $key=>$file)
        {
            $origname=$file->getClientOriginalName();
            $name=$origname . time() . '-'.$key.'.'. $file->getClientOriginalExtension();
            $file->storeAs('anexos', $name);
            $file= new Files();
            $file->filename=$name;
            $file->token_id=$namefile;
            $file->filetype=$request->filetype[$key];
            $file->save();

        }
        
        return back()->with('success','Contrato criado com sucesso.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
       $validatedata=$request->validate([
        'data_inicio'=>'required|date',
        'dias_cobertos'=>'required|numeric',
        'dias_proximo_pagamento'=>'required|numeric',
        'capital_seguro'=>'required|numeric',
        'premio_total'=>'required|numeric',
        'premio_simples'=>'required|numeric',
        'taxa_corretagem'=>'required|numeric',
        'comissao'=>'required|numeric',
        'periodicidade_pagamento'=>'required',
        'situacao'=>'required',
        'item_segurado'=>'required',
        'nome_seguradora'=>'required',
        'data_proximo_pagamento'=>'required|date',
       ]);
        $request=$request->except('_token');
        Contrato::where('id',$id)->update($request); 

        return redirect('/admin/contrato/index')->with('success','Editado criado.');
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
        $contrato->status=0;
        $contrato->save();

        return redirect('/admin/contrato/index')->with('success','Contrato eliminado.');
    }
}
