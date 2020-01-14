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
                                       ->join('consultors','contratos.consultor','consultors.id') 
                                       ->latest()->leftjoin('prospecaos','contratos.id_prospecaos','prospecaos.id')
                                       ->select('contratos.*','consultors.nome_consultor as consultorx')
                                       ->paginate(12);

        
        return view('admin.contrato.index',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
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
        'data_inicio'=>'required',
        'dias_cobertos'=>'required',
        'dias_proximo_pagamento'=>'required',
        'capital_seguro'=>'required',
        'premio_total'=>'required',
        'premio_simples'=>'required',
        'taxa_corretagem'=>'required',
        'comissao'=>'required',
        'periodicidade_pagamento'=>'required',
        'situacao'=>'required',
        'item_segurado'=>'required',
       ]);
       
       //file name
        $namefile = Str::random(32).'anexo'.time();



        $prospecao=Prospecao::find($request->id_prospecaos);
      
        $prospecao->status=0;
        $prospecao->save();

        $data=$request->all();
        unset($data['filetype']);//remove time from array before save
        unset($data['file']);//remove time from array before save
        $data["nome_segurado"]=$prospecao->nome_cliente;
        $data["consultor"]=$prospecao->nome_consultor;
        $data["ramo_negocio"]=$prospecao->tipo_prospecao;
        $data["token_id"]=$namefile;
        $data["email_segurado"]=$prospecao->email_cliente;

        
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
    public function update(Request $request, Contrato $contrato, $id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->nome_segurado = $request->input('nome_segurado');
        $contrato->email_segurado = $request->input('email_segurado');
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
