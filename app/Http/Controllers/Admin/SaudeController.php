<?php

namespace App\Http\Controllers\Admin;

use App\Saude;
use App\Seguradora;
use App\Consultor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaudeRequest;
use Carbon\Carbon;
use App\Cliente;
use App\Files;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class SaudeController extends Controller
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
    {   $this->authorize('saudes');

        $saude = Saude::latest()->paginate(12);
        return view('admin.saude.index',compact('saude'))->with('i', (request()->input('page', 1) -1) * 12);
    }
    public function expira()
    {   $this->authorize('saudes');
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');

        $saude = Saude::latest()
                    ->whereBetween('data_proximo_pagamento',[$start,$end])
                    ->paginate(12);
        return view('admin.saude.expira',compact('saude'))->with('i', (request()->input('page', 1) -1) * 12);
    }

        public function expiraFiltro(Request $request)
    {
        $this->authorize('saudes');

        $request->validate([
            'start'=>'required|date',
            'end'=>'required|date|after:start'
        ]);

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end)->addHours(23)->addMinutes(59)->addSecond(59);
        $contratos = Saude::where("contratos.status",1)
                                       ->whereBetween('data_proximo_pagamento',[$start,$end])
                                       ->latest()
                                       ->paginate(12);

        
        return view('admin.saude.expira',compact('contratos'))->with('i', (request()->input('page', 1) -1) * 12);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   $this->authorize('saudes_create');

        $saudes = Saude::where('tipo_membro','Policy Holder')->get();
        $consultor = Consultor::all();
        $seguradora = Seguradora::all();
        $cliente=Cliente::where('status',1)->where('id',$id)->first();
        if (!$cliente)
        {
        	return back()->with('error','Cliente desativado');
        };
        return view('admin.saude.create',compact('saudes','seguradora','consultor','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->authorize('saudes_create');
        $saude=$request->all();

         $validatedata = Validator::make($request->all(),[
        'nome_seguradora'=>'required',
        'plano'=>'required|string|min:3|max:100',
        'numero_membro'=>'required|string|min:3|max:100|unique:saudes,numero_membro',
        'tipo_membro'=>'required|string|min:3|max:100',
        'periodicidade_pagamento'=>'required|string',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'required|date',
        'premio_total'=>'required|numeric|min:1',
        'premio_simples'=>'required|numeric|min:1',
        'taxa_corretagem'=>'required|regex:/^\d*\.?\d*$/',
        'comissao'=>'required|regex:/^\d*\.?\d*$/|min:1',
        'consultor'=>'required|string',
        'nome_grupo'=>'nullable|string',
        'menbro_principal'=>'required_if:tipo_membro,Spouse|required_if:tipo_membro,Child|string',
        'detalhes_item_segurado'=>'nullable|string',
        'user_id'=>'required',
        'client_id' =>'required',
        'client_token' => 'required',
        //'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        //'filetype.*' => 'required',
        'custo_admin'=>'required|numeric|min:1',
        'imposto_selo'=>'required|numeric|min:1',
        'sobre_taxa'=>'required|numeric|min:1',
         ]);


    if ($validatedata->passes()) {
        //file name
        $namefile = Str::random(32).'saude'.time();
        //unset($saude['filetype']);//remove time from array before save
        //unset($saude['file']);//remove time from array before save
        $saude["token_id"]=$namefile;

         Saude::create($saude);
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
            $arr = array('msg' => 'Saude criado.', 'status' => true);
            return Response()->json($arr);
    } 
 
            return response()->json(['errors'=>$validatedata->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $this->authorize('saudes_show');
        $saude = Saude::findOrFail($id);

        $anexos=Files::where('token_id',$saude->token_id)->count();

        return view('admin.saude.show',compact('saude','anexos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function edit(Saude $saude, $id)
    {  $this->authorize('saudes_edit');
        $consultors = Consultor::all();
        $seguradora = Seguradora::all();
        $saude = Saude::findOrFail($id);


        return view('admin.saude.edit',compact('seguradora','consultors','saude'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saude $saude, $id)
    {
         $this->authorize('saudes_edit');
        //dd($request->data['numero_membro']);
        //dd($request->numero_membro);
        $data=$this->validate($request, array(
            'nome_seguradora'=>'nullable',
            'plano'=>'nullable|string|min:3|max:100',
            'numero_membro' => ['nullable','string','min:3','max:192',Rule::unique('saudes','numero_membro')->ignore($request->numero_membro,'numero_membro')],
            'tipo_membro'=>'nullable|string|min:3|max:100',
            'periodicidade_pagamento'=>'nullable|string',
            'data_inicio'=>'nullable|date',
            'data_proximo_pagamento'=>'nullable|date',
            'premio_total'=>'nullable|numeric|min:1',
            'premio_simples'=>'nullable|numeric|min:1',
            'taxa_corretagem'=>'nullable|regex:/^\d*\.?\d*$/',
            'comissao'=>'nullable|regex:/^\d*\.?\d*$/|min:1',
            'consultor'=>'nullable|string',
            'nome_grupo'=>'nullable|string',
            'menbro_principal'=>'required_if:tipo_membro,Spouse|required_if:tipo_membro,Child|string',
            'detalhes_item_segurado'=>'nullable|string',
            'user_id'=>'nullable',
            'client_id' =>'nullable',
            'client_token' => 'nullable',
            'notas' => 'nullable',
            'custo_admin'=>'required|numeric|min:1',
            'imposto_selo'=>'required|numeric|min:1',
            'sobre_taxa'=>'required|numeric|min:1',
        ));

        Saude::where('id',$id)->update($data);  


 
        return redirect('/admin/saude/index')->with('success','Contrato alterado com sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saude  $saude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saude $saude, $id)
    {    $this->authorize('saudes_destroy');
        $saude= \App\Saude::find($id);
        $saude->delete();

        return redirect('/admin/saude/index');

    }
}
