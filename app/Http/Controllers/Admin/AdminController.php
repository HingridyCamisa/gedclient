<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Prospecao;
use App\Segurado;
use App\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\Charts\Charts as grafico;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Prospecao::get()->groupBy('tipo_prospecao')->map(function ($item) {
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

        $emidiodata=Prospecao::get()->groupby('nome_consultor')->map(function ($item) {
            // Return the number of persons
            return count($item);
        });

        //dd($emidiodata);

        $emidio = new grafico;
        $emidio->labels($emidiodata->keys());
        $emidio->title('Nº de Prospeção por Consultores');
        $emidio->dataset('Consultores', 'bar', $emidiodata->values());
        

        
        
        $prospecao = Prospecao::all();
        $segurado = Segurado::all();
        $contrato = Contrato::all();
        
    

         return view('admin.home.index',compact('prospecao','segurado','contrato','emidio','chart'));
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
