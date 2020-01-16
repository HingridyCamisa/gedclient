<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Cliente;

class AvisoDeCobrancaController extends Controller
{
    public function aviso ($tipo,$id)
    {
       
        $contrato=DB::table($tipo)->where('id',$id)->first();
        $cliente=Cliente::find($contrato->client_id);
        if(!isset($contrato))
        {
            return back()->with('error','Sem Detalhes');
        };

        $data_inicio=new Carbon ($contrato->data_inicio);
        $data_fim=new Carbon ($contrato->data_proximo_pagamento);
        $dias_cobertos=$data_inicio->diffInDays($data_fim);
        $denominador=0;
        if ($contrato->periodicidade_pagamento=='Anual')
         {
         	$denominador=1;
            $dia_periodo=366;
         }elseif($contrato->periodicidade_pagamento=='Mensal')
            {
                $denominador=12;
                $dia_periodo=30;
            }elseif($contrato->periodicidade_pagamento=='Trimestral')
                {
                    $denominador=4;
                    $dia_periodo=91.5;
                }elseif($contrato->periodicidade_pagamento=='Semestral')
                    {
                        $denominador=2;
                        $dia_periodo=180;
                    }elseif($contrato->periodicidade_pagamento=='Não Renovável')
                        {
                            $dia_periodo=1;
                        }else{
                                return back()->with('error','Forma de pagamento');
                             };
        $denominador=round($denominador,0);
        $dia_periodo=round($dia_periodo,0);
        $valor_a_pagar=$contrato->premio_total/$denominador;
        

        return view('admin.avisoCobranca.show',compact('cliente','contrato','denominador','valor_a_pagar','dia_periodo','dias_cobertos'));
    }
}
