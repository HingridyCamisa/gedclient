<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Files;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::latest()
                           ->paginate(12);
        return view('admin.clientes.index',compact('clientes'))->with('i', (request()->input('page', 1) -1) * 12);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $cliente=$request->all();
        $request->validate([
            'cliente_tipo'=>'required|string|min:1',
        ]);

        if ($cliente['cliente_tipo']=='Individual')
        {
         $validatedata=$request->validate([
        'file.*' => 'nullable|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'nullable|string',
        'cliente_nome'=>'required|string|min:3|max:100|unique:clientes,cliente_nome',
        'cliente_endereco'=>'required|string|min:3|max:100',
        'cliente_data_nascimento'=>'required|date',
        'cliente_genero'=>'required|string|min:3|max:100',
        'cliente_email'=>'nullable|email|unique:clientes,cliente_email',
        'cliente_telefone_1'=>'required|digits:9|unique:clientes,cliente_telefone_1|unique:clientes,cliente_telefone_2',
        'cliente_telefone_2'=>'nullable|digits:9|unique:clientes,cliente_telefone_1|unique:clientes,cliente_telefone_2',
        'cliente_state_id'=>'required|numeric',
        'cliente_id_tipo'=>'required|string|min:1',
        'cliente_id_numero'=>'required|string|min:1|unique:clientes,cliente_id_numero',
        'notas'=>'nullable|string',
        'cliente_tipo'=>'required|string|min:1',
       ]);
        }elseif ($cliente['cliente_tipo']=='Empresa')
        {
         $validatedata=$request->validate([
        'file.*' => 'nullable|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'nullable|string|',
        'cliente_nome'=>'required|string|min:3|max:100',
        'cliente_endereco'=>'required|string|min:3|max:100',
        'cliente_email'=>'nullable|email',
        'cliente_telefone_1'=>'required|digits:9',
        'cliente_telefone_2'=>'nullable|digits:9',
        'cliente_state_id'=>'required|numeric',
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
         
        //file name
        $namefile = Str::random(32).'cliente'.time();
        unset($validatedata['filetype']);//remove time from array before save
        unset($validatedata['file']);//remove time from array before save
        $validatedata["token_id"]=$namefile;

        Cliente::create($validatedata);

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
        return redirect('/admin/clientes')->with('success','Cliente criado.');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, $id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
