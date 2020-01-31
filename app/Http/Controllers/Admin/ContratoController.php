<?php

namespace App\Http\Controllers\Admin;

use App\Seguradora;
use App\TipoSeguro;
use App\Consultor;
use App\Contrato;
use App\Prospecao;
use App\Ramo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Files;
use App\Cliente;
use Illuminate\Validation\Rule;

class ContratoController extends Controller
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
        $this->authorize('contratos');
        $contratos = Contrato::where("contratos.status",1)
                                       ->latest()
                                       ->paginate(12);

        
        return view('admin.contrato.index',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
    }
    public function expira()
    {
        $this->authorize('contratos');
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        $contratos = Contrato::where("contratos.status",1)
                                       ->whereBetween('data_proximo_pagamento',[$start,$end])
                                       ->latest()
                                       ->paginate(12);

        
        return view('admin.contrato.expira',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $this->authorize('contratos_create');
        $contrato = Contrato::all();
        $seguradora = Seguradora::all();
        $tipo_seguro = TipoSeguro::all();
        $consultor = Consultor::all();
        $ramos = Ramo::all();
        $cliente=Cliente::where('status',1)->where('id',$id)->first();
        if (!$cliente)
        {
        	return back()->with('error','Cliente desativado');
        };

        return view('admin.contrato.create',compact('contrato','tipo_seguro','seguradora','consultor','cliente','ramos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->authorize('contratos_create');
         $validatedata=$request->validate([
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        'nome_seguradora'=>'required',
        'numero_apolice'=>'required|string|min:3|max:100|unique:contratos,numero_apolice',
        'periodicidade_pagamento'=>'required|string',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'required|date',
        'capital_seguro'=>'numeric|min:1|required_if:tipo_ramo,Automóvel - Responsabilidade Civil',
        'premio_total'=>'required|numeric|min:1',
        'premio_simples'=>'required|numeric|min:1',
        'taxa_corretagem'=>'required|numeric',
        'comissao'=>'required|numeric|min:1',
        'item_segurado'=>'required|string|min:1',
        'situacao'=>'required|string',
        'consultor'=>'required|string',
        'detalhes_item_segurado'=>'required|string',
        'tipo_ramo'=>'required|string',
        'user_id'=>'required',
        'client_id' =>'required',
        'client_token' => 'required',
        'custo_admin'=>'required|numeric|min:1',
        'imposto_selo'=>'required|numeric|min:1',
        'sobre_taxa'=>'required|numeric|min:1',
       ]);
       
       //file name
        $namefile = Str::random(32).'anexo'.time();

        $data=$request->all();
        unset($data['filetype']);//remove time from array before save
        unset($data['file']);//remove time from array before save
        $data["token_id"]=$namefile;

        
        Contrato::create($data);

        //storag file
        if ($request->file('file'))
        {
        
                foreach($request->file('file') as $key=>$file)
                {
                    $origname=$file->getClientOriginalName();
                    $name=time() . '_'.$key.'.'. $origname;
                    $file->storeAs('public/anexos', $name);
                    $file= new Files();
                    $file->filename=$name;
                    $file->token_id=$namefile;
                    $file->filetype=$request->filetype[$key];
                    $file->save();

                }
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
        $this->authorize('contratos_show');
        $contrato = Contrato::findOrFail($id);
        $anexos=Files::where('token_id',$contrato->token_id)->count();

        return view('admin.contrato.show',compact('contrato','anexos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato, $id)
    {   
        $this->authorize('contratos_edit');
        $seguradora = Seguradora::all();
        $consultores = Consultor::all();
        $tipo_seguro = TipoSeguro::all();
        $ramos = Ramo::all();
        $contrato = Contrato::findOrFail($id);

        return view('admin.contrato.edit',compact('contrato','seguradora','consultores','tipo_seguro','ramos'))->with('success','Contrato editado.');
    }

    public function tornarcontrato(Request $request)
    { 
        $this->authorize('tornar_contrato');
         $prospecao=Prospecao::where('status',1)->where('id',$request->id_prospecaos)->first();
        if (!$prospecao)
        {
        	return back()->with('error','Prospecção desativada');
        };
        
       $validatedata=$request->validate([
        'id_prospecaos'=>'required',
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'required|date',
        'capital_seguro'=>'numeric|required_if:tipo_ramo,Automóvel - Responsabilidade Civil',
        'premio_total'=>'required|numeric',
        'premio_simples'=>'required|numeric',
        'taxa_corretagem'=>'required|numeric',
        'comissao'=>'required|numeric',
        'periodicidade_pagamento'=>'required',
        'situacao'=>'required',
        'item_segurado'=>'required',
        'custo_admin'=>'required|numeric|min:1',
        'imposto_selo'=>'required|numeric|min:1',
        'sobre_taxa'=>'required|numeric|min:1',
        'numero_apolice'=>'required|string|min:3|max:100|unique:contratos,numero_apolice',
       ]);
       
       //file name
        $namefile = Str::random(32).'anexo'.time();
      
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
        if ($request->file('file'))
        {
        
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
        }
        
        return back()->with('success','Contrato criado.');
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
       $this->authorize('contratos_edit');
       $validatedata=$request->validate([
        'nome_seguradora'=>'nullable',
        'numero_apolice'=>['nullable','string','min:3','max:100',Rule::unique('contratos','numero_apolice')->ignore($id,'id')],
        'periodicidade_pagamento'=>'nullable|string',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'nullable|date',
        'capital_seguro'=>'numeric|min:1|required_if:tipo_ramo,Automóvel - Responsabilidade Civil',
        'premio_total'=>'nullable|numeric|min:1',
        'premio_simples'=>'nullable|numeric|min:1',
        'taxa_corretagem'=>'nullable|numeric',
        'comissao'=>'nullable|numeric|min:1',
        'item_segurado'=>'nullable|string|min:1',
        'situacao'=>'nullable|string',
        'consultor'=>'nullable|string',
        'detalhes_item_segurado'=>'nullable|string',
        'tipo_ramo'=>'nullable|string',
        'user_id'=>'nullable',
        'client_id' =>'nullable',
        'client_token' => 'nullable',
        'custo_admin'=>'nullable|numeric|min:1',
        'imposto_selo'=>'nullable|numeric|min:1',
        'sobre_taxa'=>'nullable|numeric|min:1',
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
    {   $this->authorize('contratos_destroy');
        $contrato= \App\Contrato::find($id);
        $contrato->status=0;
        $contrato->save();

        return redirect('/admin/contrato/index')->with('success','Contrato eliminado.');
    }
}
