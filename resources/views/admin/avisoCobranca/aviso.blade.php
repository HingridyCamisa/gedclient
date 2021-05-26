@extends('adminlte::page')

@section('title','Aviso')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i> </a>
      <a href="{{url('admin/avisode-cobranca-view-all',[$avisosDB[0]->tipo,$avisosDB[0]->contrato_token_id,$avisosDB[0]->token_id])}}" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-globe"></i> Todos não cobrados
  </a>
    </h1>

@stop

@section('content')
@include('notification')
 
<div class="box box-solid box-danger">
            <div class="box-header">
                        <center><h3 class="box-title"><strong><i class="fa fa-fw fa- fa-fax"></i> Aviso de Cobrança </strong></h3></center>
            </div>
<page id="printableArea" name="printableArea"> 
     <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            Amana Corretores e Consultores de Seguros, SA
            <small class="pull-right">Data: {{\Carbon\Carbon::now()->format('d-m-Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            Aeroporto de Maputo - Terminal de Carga,<br> Escritório Nr. 55<br>
            Nuit: 400875367<br>
            Cell: (+258) 87 100 009 8<br>
            Fixo: (+258) 21 087 442<br>
            Email: info@amanaseguros.co.mz<br>
            Maputo, Moçambique
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b><img src="{{asset('/img/amana2.png')}}"   alt="logo" width="200" height="100"></b><br>  
          <br>
          <b>&emsp;&emsp;&emsp;&emsp;Aviso Nᵒ  #{{str_pad($avisosDB[0]->id, 6, "0", STR_PAD_LEFT)}}</b>
          
        </div>
        <!-- /.col -->
      </div>

      <br>
      <!-- /.row -->
      
      <h5><strong>AVISO DE COBRANÇA</strong></h5>
      <div class="box box-solid box-danger">
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col" >
        <address>
            <br>
            <b> Segurado/ Insured:</b> {{$avisosDB[0]->cliente->cliente_nome}}<br>
            <b> Endereço:</b> {{$avisosDB[0]->cliente->cliente_endereco}}<br>
            <b> País:</b> {{$avisosDB[0]->cliente->client_country_city->country_name}} <br>
            <b> Localidade / City:</b> {{$avisosDB[0]->cliente->client_country_city->state_name}}<br>
            <b> NUIT/ Tax payer Nᵒ:</b> {{$avisosDB[0]->cliente->cliente_nuit}} <br>
            <b> Nᵒ do Cliente:</b> M{{str_pad($avisosDB[0]->cliente->id, 6, "0", STR_PAD_LEFT)}}<br><br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b> Seguradora:</b> {{$avisosDB[0]->Contrato->seguradora->nome_seguradora}}<br>
            <b> Nᵒ Apólice:</b> {{$avisosDB[0]->Contrato->numero_apolice}}<br>
            <b> Periodicidade de Pagamento:</b> {{$avisosDB[0]->Contrato->periodicidade_pagamento }}<br>
            <b> Periodo de Seguro de:</b> {{date('d-m-Y',strtotime($avisosDB[0]->Contrato->data_inicio))}}<br>
            <b> Periodo de Seguro até:</b> {{date('d-m-Y',strtotime($avisosDB[0]->Contrato->data_proximo_pagamento))}}<br>
            <b> Tipo de Seguro:</b> {{$avisosDB[0]->Contrato->ramo->ramo}}<br>
        </address>
        </div>
        <!--<div class="col-sm-4 invoice-col">
            <address>
            <br>
            <b> Data Limite de Pagamento:</b> {{date('d-m-Y',strtotime($avisosDB[0]->aviso_data_inicial))}}<br>
            
              
            </address>
        </div>-->
      
      </div>

    </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nᵒ Aviso</th>
              <th>Periodo de Cobrança</th>
              <th>Descrição</th>
              <th>Pagamento</th>
              <th>Seguradora</th>
              <th>Valor</th>
            
            </tr>
            </thead>
            <tbody>
            @php($aviso_amount=0)
            @php($t=0)
            @php($t1=0)
            @php($t2=0)
            @php($t3=0)
            @php($t4=0)
            @foreach($avisosDB as $key => $aviso)
            <tr>
              <td>{{$avisosDB[0]->aviso_numero}}</td>
              <td>{{date('d-m-Y',strtotime($aviso->aviso_data_inicial))}} - {{date('d-m-Y',strtotime($aviso->aviso_data))}}</td>
              <td>{{$aviso->Contrato->detalhes_item_segurado}}</td>
              <td>{{$aviso->Contrato->periodicidade_pagamento}}</td>
              <td>{{$aviso->Contrato->seguradora->nome_seguradora}}</td>
              <td>{{number_format(round($aviso_amount=$aviso->aviso_amount,2), 2, ',', ' ')}} MTN</td>
              @php($t=$aviso_amount+$t)
              @php($t1=$aviso->premio_simples+$t1)
              @php($t2=$aviso->custo_admin+$t2)
              @php($t3=$aviso->imposto_selo+$t3)
              @php($t4=$aviso->sobre_taxa+$t4)
            </tr>

            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead"><strong><i class="fa fa-fw fa-cc-visa"></i>Dados Bancários:</strong></p>

          <div class="box" width="">
            <table class="table" width="">
                <tbody>
                    <tr>
                        <th>Banco:</th>
                        <td> BIM</td>
                    </tr>
                    <tr>
                        <th>Titular:</th>
                        <td>Amana Seguros, SA </td>
                  </tr>
                  <tr>
                        <th>Conta:</th>
                        <td>415522102 (MZN)</td>
                  </tr>
                  <tr>
                        <th>NIB:</th>
                        <td>00010000041552210257</td>
                    </tr>
                </tbody>
            </table> 
          </p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Nos termos dos Artigos 124º 128º  do Decreto-
          Lei Nº 1 de 2010 de 31 de Dezembro o prémio de duração do contrato de seguro é devido por inteiro, sem prejuizo de poder ser fraccionado para efeitos de pagamento
          primeira fracção deste, é devido na data da celebração do contrato. As fracções seguintes do prémio inicial, o prémio de anuidades subsequentes e as sucessivas fracções


          </p>
        </div>
        <!-- /.col detalhes por encargos -->
        
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th>Prémio líquido / Net premium:</th>
                <td>{{number_format(round($t1,2), 2, ',', ' ')}} MTN</td>
              </tr>
              <tr>
                <th>Encargos / Administration:</th>
                <td>{{number_format(round($t2,2), 2, ',', ' ')}} MTN</td>
              </tr>
              <tr>
                <th>Selos / Stamps:</th>
                <td>{{number_format(round($t3,2), 2, ',', ' ')}} MTN</td>
              </tr>
              <tr>
                <th>Sobretaxa / Subcharge:</th>
                <td>{{number_format(round($t4,2), 2, ',', ' ')}} MTN</td>
              </tr>
              <tr class="table-danger">
                <th>Total:</th>
                <td><b>{{number_format(round(($t1+$t2+$t3+$t4),2), 2, ',', ' ')}} MTN</b></td>
              </tr>
            </tbody>
          </table>
          </div>
        </div>
          
        <!-- /.col -->
      </div>
      <!-- /.row -->
     </section>
</page>


    
    <section class="invoice">
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-default"><i class="fa fa-print fa-1x" aria-hidden="true"></i> Imprimir</a>
          @if($aviso->status==3)

          <a type="button" class="btn btn-success pull-right" href="{{url('admin/aviso/approver',$aviso->id)}}" style="margin-right: 5px;"><i class="fa fa-credit-card"></i> Aprovar
          </a>

          <a type="button" class="btn btn-danger pull-right" href="{{url('admin/aviso/destroy',[$aviso->tipo,$aviso->contrato_token_id,$aviso->token_id,$aviso->id])}}" style="margin-right: 5px;"><i class="fa fa-trash-o"></i> Eliminar
          </a>

          @elseif($aviso->status==1)
          <a type="button" class="btn btn-danger pull-right" href="{{url('admin/aviso/destroy',[$aviso->tipo,$aviso->contrato_token_id,$aviso->token_id,$aviso->id])}}" style="margin-right: 5px;"><i class="fa fa-trash-o"></i> Eliminar
          </a>
          @endif
          <a type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{url('admin/aviso/pdf',[$aviso->tipo,$aviso->contrato_token_id,$aviso->token_id,$aviso->id])}}">
            <i class="fa fa-download"></i> PDF
          </a>
          <a type="button" class="btn btn-primary pull-right" style="margin-right: 5px;" href="{{url('admin/aviso/pdf/all',[$aviso->tipo,$aviso->contrato_token_id,$aviso->token_id,$aviso->id])}}">
            <i class="fa fa-download"></i> PDF não cobrados
          </a>
        </div>
      </div>
    </section>
      
    </div>                                                                                                                                       

@stop

