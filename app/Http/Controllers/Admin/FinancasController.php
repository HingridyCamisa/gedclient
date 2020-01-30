<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\AvisoCobrancaView;
use App\Http\Controllers\Controller;
use App\AvisoCobranca;
use App\Files;
use App\Recibos;
use App\AvisoCobrancaRecibosView;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use DB;
use App\ExtratoClient;
use App\Cliente;


class FinancasController extends Controller
{
     
      protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }

   public function index()
    {   $this->authorize('financas_avisos');
        $avisos=AvisoCobrancaView::latest()->paginate(12);
        return view('admin.financas.index', compact('avisos'))->with('i', (request()->input('page', 1) -1) * 12);
    } 

    public function extratrecibo($token_id)
    {    $this->authorize('financas_extrair_recibo');
       $recibo=AvisoCobrancaRecibosView::where('token_id',$token_id)->first();
       $anexos=Files::where('token_id',$token_id)->count();
       return view('admin.financas.extratrecibo', compact('recibo','anexos'));
    }
    
   public function recibostable()
    {    $this->authorize('financas_recibos');
        $avisos=AvisoCobrancaRecibosView::latest()->paginate(12);
        return view('admin.financas.recibos', compact('avisos'))->with('i', (request()->input('page', 1) -1) * 12);
    }

    public function destroy($id)
    {   $this->authorize('financas_aviso_destroy');
        $destroy= \App\AvisoCobranca::find($id);
        $destroy->status=0;
        $destroy->save();

        return redirect()->back()->with('success','Aviso eliminado.');
    }
    public function destroyrecibos($id)
    {   $this->authorize('financas_recibo_destroy');
        $destroy= \App\Recibos::find($id);
        $destroy->status=0;
        $destroy->save();

        return redirect()->back()->with('success','Recibo eliminado.');
    }

    public function savepaymat(Request $request)
    {   $this->authorize('financas_make_payment');

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
        'operacao'=>'required',
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


    public function  extratoCliente($id)
    {  $this->authorize('financas_extrato_cliente');

       $extrato = DB::select('select * from extrato_clientes where cliente_token_id=:cliente_token_id', ['cliente_token_id' =>$id]);
       $cliente = Cliente::where('token_id',$id)->first();
     
       //dd($extrato);

       
               
      if (!($extrato))
        {
        	return back()->with('error','Cliente sem contrato');
      }

        return view('admin.financas.extrato',compact('extrato', 'cliente'))->with('success','Extrato gerado com sucesso.');
    }
}
