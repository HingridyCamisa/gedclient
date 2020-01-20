<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Cliente;
use App\AvisoCobranca;
use Auth;
use App\AvisoCobrancaSaude;

class AvisoDeCobrancaController extends Controller
{
    public function aviso ($tipo,$id,$token_id)
    {
        $avisosDB=AvisoCobranca::where('tipo',$tipo)->where('contrato_token_id',$token_id)->get();
        $contrato=DB::table($tipo)->where('id',$id)->first();
        $cliente=Cliente::find($contrato->client_id);
       
        if(!isset($contrato))
        {
            return back()->with('error','Sem Detalhes');
        };

        $data_inicio=new Carbon ($contrato->data_inicio);
        $data_fim=new Carbon ($contrato->data_proximo_pagamento);
        $year=$data_fim->format('Y');
        $dias_cobertos=$data_inicio->diffInDays($data_fim);
        $denominador=0;
        if ($contrato->periodicidade_pagamento=='Anual')
         {
         	$denominador=1;
            $dia_periodo=$this->cal_days_in_year($year);
         }elseif($contrato->periodicidade_pagamento=='Mensal')
            {
                $denominador=12;
                $dia_periodo=30;
            }elseif($contrato->periodicidade_pagamento=='Trimestral')
                {
                    $denominador=4;
                    $dia_periodo=($this->cal_days_in_year($year)/4);
                }elseif($contrato->periodicidade_pagamento=='Semestral')
                    {
                        $denominador=2;
                        $dia_periodo=($this->cal_days_in_year($year))/6;
                    }elseif($contrato->periodicidade_pagamento=='Não Renovável')
                        {
                            $dia_periodo=1;
                            $denominador=1;
                        }else{
                                return back()->with('error','Forma de pagamento');
                             };
        $denominador=round($denominador,0);
        $dia_periodo=round($dia_periodo,0);
        $valor_a_pagar=$contrato->premio_total/$denominador;
        

        return view('admin.avisoCobranca.show',compact('cliente','contrato','denominador','valor_a_pagar','dia_periodo','dias_cobertos','tipo','avisosDB'));
    }

    public function gerar_aviso_de_cobranca(Request $request,$tipo,$contrato,$cliente,$numero,$valor_a_pagar,$data)
    {
        $token_id=$contrato.$numero;
        $request['token_id']=$token_id;
        $request->validate([
            'token_id'=>'required|unique:avisocobranca,token_id',
        ]);

        $aviso=new AvisoCobranca;
        $aviso->tipo=$tipo;
        $aviso->contrato_token_id=$contrato;
        $aviso->cliente_token_id=$cliente;
        $aviso->aviso_numero=$numero;
        $aviso->aviso_amount=$valor_a_pagar;
        $aviso->aviso_data=$data;
        $aviso->user_id=Auth::user()->id;
        $aviso->token_id=$token_id;
        $aviso->save();
        

        return back()->with('success','Aviso criado com sucesso.');
        
    }

    function cal_days_in_year($year){
    $days=0; 
    for($month=1;$month<=12;$month++){ 
        $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);
     }
     return $days;
    }


        public function avisoview($tipo,$contrato_token_id,$token_id)
    {   
        if ($tipo=='contratos')
        {
        	 $avisosDB=AvisoCobranca::where('tipo',$tipo)->where('token_id',$token_id)->get();
        }
        else
        {
            $avisosDB=AvisoCobrancaSaude::where('tipo',$tipo)->where('token_id',$token_id)->get();
        }
        return view('admin.avisoCobranca.aviso',compact('avisosDB'))->with('success','Gerado com sucesso.');
    }

        public function avisoviewall($tipo,$contrato_token_id,$token_id)
    {   

        if ($tipo=='contratos')
        {
        	 $avisosDB=AvisoCobranca::where('tipo',$tipo)->where('contrato_token_id',$contrato_token_id)->where('status',1)->orderby('created_at','asc')->get();
        }
        else
        {
             $avisosDB=AvisoCobrancaSaude::where('tipo',$tipo)->where('contrato_token_id',$contrato_token_id)->where('status',1)->orderby('created_at','asc')->get();      
        }


       

        return view('admin.avisoCobranca.aviso',compact('avisosDB'))->with('success','Gerado com sucesso.');
    }
}
