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
use App\AvisoCobrancaView;
use App\Files;
use App\Contrato;
use App\Saude;
use App\Recibos;


class AvisoDeCobrancaController extends Controller
{

      protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }
    public function avisoViaTableAvisos($id)
    {
        $data=AvisoCobranca::find($id);
        $tipo=$data->tipo;
        $token_id=$data->contrato_token_id;

        if ($tipo=='contratos')
        {   $contrato=Contrato::where('token_id',$token_id)->first();	
        }elseif($tipo=='saudes')
        {   $contrato=Saude::where('token_id',$token_id)->first();
        }

        $id=$contrato->id;

        return $this->aviso ($tipo,$id,$token_id);
    }

    public function aviso ($tipo,$id,$token_id)
    {

         $this->authorize('avisos_show');

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

    public function gerar_aviso_de_cobranca(Request $request,$tipo,$contrato,$cliente,$numero,$valor_a_pagar,$data,$denominador)
    {    $this->authorize('avisos_make');

        $contrato_data=Contrato::where('token_id',$contrato)->first();
        if (!$contrato_data) {
            return back()->with('error','Problemas com contrato.');
        }

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
        $aviso->premio_simples=($contrato_data->premio_simples/$denominador);
        $aviso->custo_admin=($contrato_data->custo_admin/$denominador);
        $aviso->imposto_selo=($contrato_data->imposto_selo/$denominador);
        $aviso->sobre_taxa=($contrato_data->sobre_taxa/$denominador);
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
        	 $avisosDB=AvisoCobranca::where('tipo',$tipo)->where('contrato_token_id',$contrato_token_id)->orwhere('status',3)->orwhere('status',1)->orderby('created_at','asc')->get();
        }
        else
        {
             $avisosDB=AvisoCobrancaSaude::where('tipo',$tipo)->where('contrato_token_id',$contrato_token_id)->orwhere('status',3)->orwhere('status',1)->orderby('created_at','asc')->get();      
        }


       

        return view('admin.avisoCobranca.aviso',compact('avisosDB'))->with('success','Gerado com sucesso.');
    }

    public function index()
    {
         $this->authorize('avisos');

        $avisos=AvisoCobrancaView::latest()->paginate(5000);
        return view('admin.avisoCobranca.index', compact('avisos'))->with('i', (request()->input('page', 1) -1) * 12);
    }

    public function showContratoViaAviso( $id)
    {
        $this->authorize('contratos_show');


        $aviso = AvisoCobranca::findOrFail($id);
        $table=$aviso->tipo;
        $token_id=$aviso->contrato_token_id;

        $anexos=Files::where('token_id',$token_id)->count();
        if ($table=='contratos')
        {   $contrato=Contrato::where('token_id',$token_id)->first();
            return view('admin.contrato.show',compact('contrato','anexos'));	
        }elseif($table=='saudes')
        {   $saude=Saude::where('token_id',$token_id)->first();
            return view('admin.saude.show',compact('saude','anexos'));
        }
        
        return "Tipo de contrato não encotrado, Tente mas tarde";
        
    }

public $tipo;
public $contrato_token_id;
public $token_id;


        public function destroy($tipo,$contrato_token_id,$token_id,$id)
    {   $this->authorize('aviso_destroy');
        $this->tipo=$tipo;
        $this->contrato_token_id=$contrato_token_id;
        $this->token_id=$token_id;

        $destroy= \App\AvisoCobranca::find($id);

        $recibos=Recibos::where('aviso_id',$id)->count();
        if ($recibos>1) {
            return redirect()->back()->with('error','Aviso Pago.');
        };

        if ($destroy->status==3 || $destroy->status==1) {
               $destroy->delete();

               return redirect()->route('avisode-cobranca-index')->with('sucesso','Aviso Eliminado');
               //$this->avisoview($tipo,$contrato_token_id,$token_id);
               //return redirect()->route('avisode-cobranca-view',[$this->tipo,$this->contrato_token_id,$this->token_id])->with('success','Aviso eliminado.');
        }
        return redirect()->back()->with('error','Aviso Pago.');
    }

        public function approver($id)
    {   $this->authorize('aviso_approver');
        $destroy= \App\AvisoCobranca::find($id);
        $destroy->status=1;
        $destroy->save();

        return redirect()->back()->with('success','Aviso atualizado.');
    }
}
