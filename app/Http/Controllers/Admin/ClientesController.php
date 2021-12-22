<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Consultor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Files;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DataTables;

class ClientesController extends Controller
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
    $this->authorize('clientes');
        $clientes=Cliente::latest()
                           ->paginate(5000);
        return view('admin.clientes.index',compact('clientes'))->with('i', (request()->input('page', 1) -1) * 12);
    }
    public function getdataClientes()
    {
      /*$clientes=Cliente::select('clientes.*','uvw_country_states.country_name','uvw_country_states.state_name')
      ->leftjoin('uvw_country_states','clientes.cliente_state_id','=','uvw_country_states.id')
       ;*/
       $clientes=Cliente::select('clientes.*','uvw_country_states.country_name','uvw_country_states.state_name')
      ->leftjoin('uvw_country_states','clientes.cliente_state_id','=','uvw_country_states.id')
       ;;

       return Datatables::eloquent($clientes)
       ->addColumn('idx', 'M{{str_pad($id, 6, "0", STR_PAD_LEFT)}}')
       ->make(true);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $this->authorize('clientes_create');
        $countries = DB::table("uvw_country_states")->groupby("country_name")->pluck("country_name");
        return view('admin.clientes.create',compact('countries'));
    }

     public function getStateList(Request $request)
    {
        $states = DB::table("uvw_country_states")
        ->where("country_name",$request->country_id)
        ->pluck("state_name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        
        $cities = DB::table("tbl_cities")
        ->where("state_id",$request->state_id)
        ->pluck("name","id");
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->authorize('clientes_create');
        $cliente=$request->all();
        $validatedata = Validator::make($request->all(), [
            'cliente_tipo'=>'required|string|min:1',
        ]);
        
        if ($validatedata->passes()) {

        if ($cliente['cliente_tipo']=='Individual')
        {


        $validatedata = Validator::make($request->all(),[
        //'file.*' => 'nullable|mimes:jpeg,png,pdf,doc,docx,xlsx|max:5000',
        //'filetype.*' => 'nullable|string',
        'cliente_nome'=>'required|string|min:3|max:100|unique:clientes,cliente_nome',
        'cliente_endereco'=>'required|string|min:3|max:100',
        'cliente_data_nascimento'=>'required|date',
        'cliente_genero'=>'required|string|min:3|max:100',
        'cliente_email'=>'nullable|email|unique:clientes,cliente_email',
        'cliente_telefone_1'=>'required|numeric',
        'cliente_telefone_2'=>'nullable|numeric',
        /*'cliente_telefone_1'=>'required|numeric|unique:clientes,cliente_telefone_1|unique:clientes,cliente_telefone_2',
        'cliente_telefone_2'=>'nullable|numeric|unique:clientes,cliente_telefone_1|unique:clientes,cliente_telefone_2',*/
        'cliente_state_id'=>'required|numeric',
        'cliente_id_tipo'=>'required|string|min:1',
        'cliente_id_numero'=>'required|string|min:1|unique:clientes,cliente_id_numero',
        'notas'=>'nullable|string',
        'cliente_tipo'=>'required|string|min:1',
        //'cliente_nuit'=>'required|digits:9|min:9|max:9|unique:clientes,cliente_nuit',
        'cliente_nuit'=>'required|digits:9|min:9|max:9',
       ]);


        $valdata=[
        'cliente_nome'=>$request->cliente_nome,
        'cliente_endereco'=>$request->cliente_endereco,
        'cliente_data_nascimento'=>$request->cliente_data_nascimento,
        'cliente_genero'=>$request->cliente_genero,
        'cliente_email'=>$request->cliente_email,
        'cliente_telefone_1'=>$request->cliente_telefone_1,
        'cliente_telefone_2'=>$request->cliente_telefone_2,
        'cliente_state_id'=>$request->cliente_state_id,
        'cliente_id_tipo'=>$request->cliente_id_tipo,
        'cliente_id_numero'=>$request->cliente_id_numero,
        'notas'=>$request->notas,
        'cliente_tipo'=>$request->cliente_tipo,
        'cliente_nuit'=>$request->cliente_nuit,
        ];
        if ($validatedata->passes()) {
            $this->storeSave($request, $valdata);
            $arr = array('msg' => 'Cliente criado.', 'status' => true);
            return Response()->json($arr); 
        }



        }else
        {
        $validatedata = Validator::make($request->all(),[
        //'file.*' => 'nullable|mimes:jpeg,png,pdf,doc,docx|max:5000',
        //'filetype.*' => 'nullable|string|',
        'cliente_nome'=>'required|string|min:3|max:100',
        'cliente_endereco'=>'required|string|min:3|max:100',
        'cliente_email'=>'nullable|email',
        'cliente_telefone_1'=>'required|numeric',
        'cliente_telefone_2'=>'nullable|numeric',
        'cliente_state_id'=>'required|numeric',
        'notas'=>'nullable|string',
        'cliente_tipo'=>'required|string|min:1',
        //'cliente_nuit'=>'required|digits:9|min:9|max:9|unique:clientes,cliente_nuit',
        'cliente_nuit'=>'required|digits:9|min:9|max:9',
            
        //pessoa de contacto
        'pessoa_contacto_nome'=>'required|string|min:3|max:100',
        'pessoa_contacto_endereco'=>'nullable|string|min:3|max:100',
        'pessoa_contacto_data_nascimento'=>'nullable|date',
        'pessoa_contacto_genero'=>'nullable|string|min:3|max:100',
        'pessoa_contacto_email'=>'nullable|email',
        'pessoa_contacto_telefone_1'=>'required|numeric',
        'pessoa_contacto_telefone_2'=>'nullable|numeric',
        'pessoa_contacto_state_id'=>'nullable|numeric',
        'pessoa_contacto_id_tipo'=>'nullable|string|min:1',
        'pessoa_contacto_id_numero'=>'nullable|string|min:1',

        ]);

        $valdata=[
        'cliente_nome'=>$request->cliente_nome,
        'cliente_endereco'=>$request->cliente_endereco,
        'cliente_email'=>$request->cliente_email,
        'cliente_telefone_1'=>$request->cliente_telefone_1,
        'cliente_telefone_2'=>$request->cliente_telefone_2,
        'cliente_state_id'=>$request->cliente_state_id,
        'notas'=>$request->notas,
        'cliente_tipo'=>$request->cliente_tipo,
        'cliente_nuit'=>$request->cliente_nuit,
            
        //pessoa de contacto
        'pessoa_contacto_nome'=>$request->pessoa_contacto_nome,
        'pessoa_contacto_endereco'=>$request->pessoa_contacto_endereco,
        'pessoa_contacto_data_nascimento'=>$request->pessoa_contacto_data_nascimento,
        'pessoa_contacto_genero'=>$request->pessoa_contacto_genero,
        'pessoa_contacto_email'=>$request->pessoa_contacto_email,
        'pessoa_contacto_telefone_1'=>$request->pessoa_contacto_telefone_1,
        'pessoa_contacto_telefone_2'=>$request->pessoa_contacto_telefone_2,
        'pessoa_contacto_state_id'=>$request->pessoa_contacto_state_id,
        'pessoa_contacto_id_tipo'=>$request->pessoa_contacto_id_tipo,
        'pessoa_contacto_id_numero'=>$request->pessoa_contacto_id_numero,
        ];
        if ($validatedata->passes()) {
            $this->storeSave($request, $valdata);
            $arr = array('msg' => 'Cliente criado.', 'status' => true);
            return Response()->json($arr); 
        }

        }

    }
    return response()->json(['errors'=>$validatedata->errors()->all()]);
        

    }

    function storeSave($request, $validatedata)
    {
             //file name
        $namefile = Str::random(32).'cliente'.time();
       // unset($validatedata['filetype']);//remove time from array before save
       // unset($validatedata['file']);//remove time from array before save
        $validatedata["token_id"]=$namefile;

        Cliente::create($validatedata);

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

  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('clientes_show');
        $cliente=Cliente::find($id);
        if ($cliente->status==0)
        {
        	$messagem='Cliente desativado';
            $status='error';
        }else
         {
         	$messagem='Cliente Ativo';
            $status='success';
         };

         $anexos=Files::where('token_id',$cliente->token_id)->count();
         

        return view('admin.clientes.show',compact('cliente','anexos'))->with($status,$messagem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('clientes_edit');
        $consultors = Consultor::all();
        $cliente = Cliente::find($id);
        $countries = DB::table("uvw_country_states")->groupby("country_name")->pluck("country_name");
        return view('admin.clientes.edit', compact('cliente','countries','consultors'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('clientes_edit');
        $teste_cliente=Cliente::find($id);
        if ($teste_cliente->status==0)
        {
        	return back()->with('error','Cliente desativado');
        }
        
        $cliente=$request->all();
        $request->validate([
            'cliente_tipo'=>'required|string|min:1',
        ]);

        if ($cliente['cliente_tipo']=='Individual')
        {
         $validatedata=$request->validate([
        'cliente_nome'=>['nullable','string','min:3','max:100',Rule::unique('clientes','cliente_nome')->ignore($id,'id')],
        'cliente_endereco'=>'nullable|string|min:3|max:100',
        'cliente_data_nascimento'=>'nullable|date',
        'cliente_genero'=>'nullable|string|min:3|max:100',
        'cliente_email'=>['nullable','email',Rule::unique('clientes','cliente_email')->ignore($id,'id')],
        'cliente_telefone_1'=>'nullable|numeric',
        'cliente_telefone_2'=>'nullable|numeric',
        /*'cliente_telefone_1'=>['nullable','digits:9',Rule::unique('clientes','cliente_telefone_1')->ignore($id,'id'),Rule::unique('clientes','cliente_telefone_2')->ignore($id,'id')],
        'cliente_telefone_2'=>['nullable','digits:9',Rule::unique('clientes','cliente_telefone_1')->ignore($id,'id'),Rule::unique('clientes','cliente_telefone_2')->ignore($id,'id')],*/
        //'cliente_nuit'=>['nullable','digits:9',Rule::unique('clientes','cliente_nuit')->ignore($id,'id')],
        'cliente_nuit'=>'nullable|digits:9|min:9|max:9',
        'cliente_state_id'=>'nullable|numeric',
        'cliente_id_tipo'=>'nullable|string|min:1',
        'cliente_id_numero'=>['nullable','string','min:1',Rule::unique('clientes','cliente_id_numero')->ignore($id,'id')],
        'notas'=>'nullable|string',
        'cliente_tipo'=>'required|string|min:1',
       ]);
        }elseif ($cliente['cliente_tipo']=='Empresa')
        {
         $validatedata=$request->validate([
        'file.*' => 'nullable|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'nullable|string|',
        'cliente_nome'=>'nullable|string|min:3|max:100',
        'cliente_endereco'=>'nullable|string|min:3|max:100',
        'cliente_email'=>'nullable|email',
        'cliente_telefone_1'=>'nullable|digits:9',
        'cliente_telefone_2'=>'nullable|digits:9',
        'cliente_state_id'=>'nullable|numeric',
        'notas'=>'nullable|string',
        'cliente_tipo'=>'required|string|min:1',
            
        //pessoa de contacto
        'pessoa_contacto_nome'=>'required|string|min:3|max:100',
        'pessoa_contacto_endereco'=>'nullable|string|min:3|max:100',
        'pessoa_contacto_data_nascimento'=>'nullable|date',
        'pessoa_contacto_genero'=>'nullable|string|min:3|max:100',
        'pessoa_contacto_email'=>'nullable|email',
        'pessoa_contacto_telefone_1'=>'required|digits:9',
        'pessoa_contacto_telefone_2'=>'nullable|digits:9',
        'pessoa_contacto_state_id'=>'nullable|numeric',
        'pessoa_contacto_id_tipo'=>'nullable|string|min:1',
        'pessoa_contacto_id_numero'=>'nullable|string|min:1',

        ]);
        }

        Cliente::where('id',$id)->update($validatedata);  

         return redirect('/admin/clientes')->with('success','Cliente Atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('clientes_destroy');
        $cliente= \App\Cliente::find($id);
        if ($cliente->status==1)
        {
         $cliente->status=0;	
        }else
         {
         	$cliente->status=1;
         }
         
        
       
        $cliente->save();

        return redirect('/admin/clientes')->with('success','Cliente alterado com sucesso.');
    }
}
