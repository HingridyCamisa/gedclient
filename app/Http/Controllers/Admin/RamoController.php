<?php

namespace App\Http\Controllers\Admin;

use App\Ramo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RamoRequest;


class RamoController extends Controller
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
    { $this->authorize('ramos');
        
        $ramos = \App\Ramo::latest()->paginate(5000);

        return view('admin.ramo.index',compact('ramos'))->with('i',(request()->input('page', 1) -1) *50);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $this->authorize('ramos_create');
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
      $this->authorize('ramos_create');
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
    {   $this->authorize('ramos_show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ramo $ramo)
    {   $this->authorize('ramos_edit');
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
    { $this->authorize('ramos_edit');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ramo  $ramo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ramo $ramo, $id)
    {   $this->authorize('ramos_destroy');
        $ramo= \App\Ramo::find($id);
        $ramo->delete();

        return redirect('/admin/ramo/index')->with('success','Ramo apago com sucesso.');
    }
}
