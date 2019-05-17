<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Prospecao;
use App\Segurado;
use App\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use ConsoleTVs\Charts\Facades\Charts;
// use DB;
use Charts;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $prospecao = Prospecao::all();
        $segurado = Segurado::all();
        $contrato = Contrato::all();
        
        // $chart = Charts::new('line','highcharts')
        // ->setTitle("Contratos")
        // ->setLabels(["Imperial","Arko","Emose"])
        // ->setValues([100,50,20])
        // ->setElementLabel("Total Contratos");
    

         return view('admin.home.index',compact('prospecao','segurado','contrato'));
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
