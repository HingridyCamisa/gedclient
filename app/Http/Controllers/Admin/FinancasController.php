<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\AvisoCobrancaView;
use App\Http\Controllers\Controller;
use App\AvisoCobranca;


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
}
