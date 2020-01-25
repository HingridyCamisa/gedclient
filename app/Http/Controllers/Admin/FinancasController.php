<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\AvisoCobrancaView;
use App\Http\Controllers\Controller;
use App\AvisoCobranca;
use App\Files;
use App\Recibos;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class FinancasController extends Controller
{
     

   public function index()
    {

        $avisos=AvisoCobrancaView::latest()->paginate(12);
        return view('admin.financas.index', compact('avisos'))->with('i', (request()->input('page', 1) -1) * 12);
    }

    public function destroy($id)
    {
        $destroy= \App\AvisoCobranca::find($id);
        $destroy->status=0;
        $destroy->save();

        return redirect('/admin/contrato/index')->with('success','Contrato eliminado.');
    }

    public function savepaymat(Request $request)
    {   
        $pay= AvisoCobranca::find($request->aviso_id);
        if ($pay->status==0)
        {
           $arr = array('msg' => 'Aviso eliminado!', 'status' => true);
          return Response()->json($arr);
        }
        

        $validator = Validator::make($request->all(), [
        'comprovativo'=>'required|unique:recibos,comprovativo',
        'forma_pagamento'=>'required',
        'data_pagamento'=>'required|date',
        'amount'=>'required|numeric',
        'benificiario'=>'nullable',
        'testemunha'=>'nullable',
        'banco'=>'nullable',
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        ]);
        if ($validator->passes()) {
        //file name
        $namefile = Str::random(32).'anexo'.time();

        $data=$request->all();
        unset($data['filetype']);//remove time from array before save
        unset($data['file']);//remove time from array before save
        $data["token_id"]=$namefile;
        
        Recibos::create($data);

        $pay= \App\AvisoCobranca::find($request->aviso_id);
        $pay->status=2;
        $pay->save();
        
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
         $arr = array('msg' => 'Successfully updated', 'status' => true);
         return Response()->json($arr);
        }

        return response()->json(['errors'=>$validator->errors()->all()]);
    }
}
