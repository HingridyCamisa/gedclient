<?php

namespace App\Http\Controllers\Admin;

use App\Ramo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RamoRequest;


class RamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ramos = \App\Ramo::latest()->paginate(50);

        return view('admin.ramo.index',compact('ramos'))->with('i',(request()->input('page', 1) -1) *50);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ramo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RamoRequest $request)
    {
       /*$ramos = new Ramo();
       $ramos->ramo = $request->input('ramo');
       $ramos->save();*/
       Ramo::create($request->all());
       
       return redirect('/admin/ramo/index')->with('success','Ramo criado.');
    }

    /**
     * Display the specified resource.
     *
     * 
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function show(Ramo $ramo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ramo $ramo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ramo $ramo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ramo $ramo, $id)
    {
        $ramo= \App\Ramo::find($id);
        $ramo->delete();

        return redirect('/admin/ramo/index')->with('success','Ramo apago com sucesso.');
    }
}
