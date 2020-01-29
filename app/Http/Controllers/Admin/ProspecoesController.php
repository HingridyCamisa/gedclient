<?php

namespace App\Http\Controllers\Admin;

use App\Prospecao;
use App\Consultor;
use App\Seguradora;
use App\Ramo;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProspecaoRequest;
use Carbon\Carbon;
use App\Cliente;
use App\Files;
use Illuminate\Support\Str;

class ProspecoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguradora = Seguradora::all();
        $prospecaos = Prospecao::select('prospecaos.*','consultors.nome_consultor as consultor')
                                ->join('consultors','prospecaos.nome_consultor','consultors.id')
                                ->latest()
                                ->where('status','1')
                                ->paginate(12)
                                ;
                      

        $hoje = Carbon::today();
        
       return view('admin.prospecoes.index',compact('prospecaos','seguradora','hoje'))->with('i', (request()->input('page', 1) -1) * 12);
    }


    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        $consultors = Consultor::all();
        $ramos = Ramo::all();
        $cliente=Cliente::where('status',1)->where('id',$id)->first();
        if (!$cliente)
        {
        	return back()->with('error','Cliente desativado');
        };
        return view('admin.prospecoes.create',compact('consultors','cliente','ramos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProspecaoRequest $request)
    {
       $request['token_id']=Str::random(32).'prospecao'.time();
       Prospecao::create($request->all());


       return redirect('/admin/prospecoes/index')->with('success','Prospeção criada.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function show(Prospecao $prospecao, $id)
    {
        $prospecao = Prospecao::findOrFail($id);

        $anexos=Files::where('token_id',$prospecao->token_id)->count();
       

        return view('admin.prospecoes.show',compact('prospecao','anexos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospecao $prospecao, $id)
    {
        $consultors = Consultor::all();
        $ramos = Ramo::all();
        $prospecao = Prospecao::findOrFail($id);

        return view('admin.prospecoes.edit',compact('prospecao','consultors','ramos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $validatedata=$request->validate([
            'data_inicio'=>'nullable|date',
            'data_prevista_fim'=>'nullable|date|after:data_inicio',
            'tipo_ramo'=>'nullable',
            'origem_prospecao'=>'nullable',
            'estado'=>'nullable',
            'valor_estipulado_carteira' => 'numeric',
            'nome_consultor' => 'nullable',
            'detalhes_prospecao'=>'nullable|min:6'
       ]);
        $request=$request->except('_token');
        Prospecao::where('id',$id)->update($request); 

        return redirect('/admin/prospecoes/index')->with('success','Editado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospecao  $prospecao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospecao $prospecao, $id)
    {
        $prospecao= \App\Prospecao::find($id);
        $prospecao->delete();

        return redirect('/admin/prospecoes/index')->with('success','Prospeção eliminda.');;

    }
}
