<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Prospecao;
use App\Segurado;
use App\Contrato;
use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Charts\Charts as grafico;
use Carbon\Carbon;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now=Carbon::now();
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        $contrato_expira=DB::table('contratos')->whereBetween('data_proximo_pagamento',[$start,$end])->count();
        $saude_expira=DB::table('saudes')->whereBetween('data_proximo_pagamento',[$start,$end])->count();




        $cliente = Cliente::all();
        

        

        $clientes = Cliente::where('cliente_tipo','individual')->get();

        $nu_aniversarios=0;

        foreach($clientes as $key => $cliente){ 
            if(Carbon::parse($cliente->cliente_data_nascimento)->isBirthday(carbon::today()))
            {   
                $nu_aniversarios = $nu_aniversarios+1;   
            }

        }

        
        $data = Prospecao::get()->groupBy('tipo_ramo')->map(function ($item) {
            return count($item);
        });

        $chart = new grafico;
        $chart->labels($data->keys());
        $chart->title('Tipo de Prospeção');
        $chart->dataset('Nº', 'pie', $data->values())->options([
            'color' => [
                '#e74c3c','#2ecc71','#f39c12', '#3498d8','#9b59b6','#34495e','#ebdef0','#f5b7b1',
        ],
        ]);

        $emidiodata = Contrato::join('consultors','contratos.consultor','consultors.id')->get()->groupby('nome_consultor')->map(function ($item) {
            // Return the number of persons
            return count($item);

        });


        
        $emidio = new grafico;
        $emidio->labels($emidiodata->keys());
        $emidio->title('Nº de Contratos por Consultores');
        $emidio->dataset('Consultores', 'bar', $emidiodata->values());
        
       
        $data_seguradora = Contrato::join('seguradoras','contratos.nome_seguradora','seguradoras.id')->get()->groupby('nome_seguradora')->map(function ($item) {
            // Return the number of persons
            return count($item);

        });
                
        $graf_seguradora = new grafico;
        $graf_seguradora->labels($data_seguradora->keys());
        $graf_seguradora->title('Nº de Contratos por Seguradora');
        $graf_seguradora->dataset('Seguradoras', 'bar', $data_seguradora->values());

        
        
        $prospecao = Prospecao::all();
        $segurado = Segurado::all();
        $contrato = Contrato::all()->where('status',1);
       
    

         return view('admin.home.index',compact('prospecao','segurado','contrato','emidio','chart','cliente','nu_aniversarios','contrato_expira','saude_expira','graf_seguradora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
