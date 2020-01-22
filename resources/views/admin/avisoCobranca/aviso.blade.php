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
             AMANA SEGUROS
            <small class="pull-right">Data: {{\Carbon\Carbon::now()->format('d-m-Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
           <strong>Amana Correctores e Consultores de Seguros, SA</strong><br>
            Av. Fernão Magalhães, nᵒ 932 – R/C<br>
            Cell: (+258) 84 822 6218<br>
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
          <b><img src="{{asset('/img/amana2.png')}}"   alt="logo" width="300" height="100"></b><br>  
          <br>
          <b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Aviso Nᵒ  #{{str_pad($avisosDB[0]->id, 6, "0", STR_PAD_LEFT)}}</b>
          
        </div>
        <!-- /.col -->
      </div>

      <br>
      <!-- /.row -->
      
      <h5><strong>AVISO DE COBRANÇA</strong></h5>
      <div class="box box-solid box-danger">
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b> Segurado/ Insured:</b> {{$avisosDB[0]->cliente->cliente_nome}}<br>
            <b> Endereço:</b> {{$avisosDB[0]->cliente->cliente_endereco}}<br>
            <b> País:</b> {{$avisosDB[0]->cliente->client_country_city->country_name}} <br>
            <b> Localidade / City:</b> {{$avisosDB[0]->cliente->client_country_city->state_name}}<br><br>
            <b> NUIT/ Tax payer Nᵒ</b> <br><br>
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
            <b> Dias Cobertos:</b> {{\Carbon\Carbon::parse($avisosDB[0]->Contrato->data_inicio)->diffInDays(\Carbon\Carbon::parse($avisosDB[0]->Contrato->data_proximo_pagamento))}}<br>
            <b> Data Limite Pagamento:</b> {{date('d-m-Y',strtotime($avisosDB[0]->aviso_data))}}<br><br /> 
        </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <address>
                <br>
                <b>Nᵒ de Conta:</b> <br>
                <b>Data / Date:</b> <br><br>
                <b>Nᵒ Ref. Seguradora :</b> <br>
                <b>Insure Ref.ᵒ :</b> <br><br><br>
            </address>
        </div>
      
      </div>

    </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nº</th>
              <th>Limite</th>
              <th>Descrição</th>
              <th>Pagamento</th>
              <th>Seguradora</th>
              <th>Valor</th>
            
            </tr>
            </thead>
            <tbody>
             @php($t=0)
            @foreach($avisosDB as $key => $aviso)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{date('d-m-Y',strtotime($aviso->aviso_data))}}</td>
              <td>{{$aviso->Contrato->detalhes_item_segurado}}</td>
              <td>{{$aviso->Contrato->periodicidade_pagamento}}</td>
              <td>{{$aviso->Contrato->seguradora->nome_seguradora}}</td>
              <td>{{number_format(round($aviso->aviso_amount,2), 2, ',', ' ')}}</td>
              @php($t=$aviso->aviso_amount+$t)
            </tr>

            @endforeach
            </tbody>
          <tfoot>
            <tr class="table-danger">
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total</th>
              <th>{{number_format(round($t,2), 2, ',', ' ')}}</th>
              </tr>
          </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead"><strong><i class="fa fa-fw fa-cc-visa"></i>Dados Bancários:</strong></p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <b>Banco:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;BIM<br>  
          <b>Titular:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Amana Seguros, SA<br>  
          <b>Nᵒ de Conta:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;415522102 (MZN)<br>
          <b>NIB:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;00010000041552210257<br>   
          </p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Nos termos dos Artigos 124ᵒ 128ᵒ  do Decreto-
          Lei Nº 1 de 2010 de 31 de Dezembro o prémio de duração do contrato de seguro é devido por inteiro, sem prejuizo de poder ser fraccionado para efeitos de pagamento
          primeira fracção deste, é devido na data da celebração do contrato. As fracções seguintes do prémio inicial, o prémio de anuidades subsequentes e as sucessivas fracções


          </p>
        </div>
        <!-- /.col detalhes por encargos -->
        <!--
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>		
                <th style="width:50%">Subtotal:</th>
                <td>3,500.00</td>
              </tr>
              <tr>
                <th>Prémio líquido / Net premium:</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Encargos / Administration:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Selos / Stamps:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Sobretaxa / Subcharge:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </tbody></table>
          </div>
        </div>
            -->
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
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submeter Aviso
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>
        </div>
      </div>
    </section>
      
    </div>                                                                                                                                       

@stop

