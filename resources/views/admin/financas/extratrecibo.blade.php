@extends('adminlte::page')

@section('title','Aviso')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i> </a>
      <a href="{{url('admin/files/anexos',$recibo->token_id)}}" class="btn btn-danger"><span class="badge bg-teal">{{$anexos}}</span>  <i class="fa fa-file-pdf-o" ></i></a>
    </h1>

@stop

@section('content')
@include('notification')
 
<div class="box box-solid box-danger">
            <div class="box-header">
                        <center><h3 class="box-title"><strong><i class="fa fa-fw fa- fa-fax"></i> Recibo </strong></h3></center>
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
          <b>&emsp;&emsp;&emsp;Recibo Nᵒ  #{{str_pad($recibo->nu_recibo, 6, "0", STR_PAD_LEFT)}}</b>
          
        </div>
        <!-- /.col -->
      </div>

      <br>
      <!-- /.row -->
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b>ID Cliente:</b> M{{str_pad($recibo->cliente, 6, "0", STR_PAD_LEFT)}}<br>
            <b>Nome:</b> {{$recibo->cliente_nome}}<br>
            <b>Telefone:</b> {{$recibo->cliente_telefone_1}}<br>
            <b>NUIT:</b> {{$recibo->cliente_nuit}}<br>
            <b>Endereço:</b> {{$recibo->cliente_detale->cliente_endereco}}<br>
            
            <b>País:</b> {{$recibo->cliente_detale->client_country_city->country_name}}<br>
            <b>City:</b> {{$recibo->cliente_detale->client_country_city->state_name}}<br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b>Nᵒ Apólice:</b> {{$recibo->numero_apolice}}<br>  
            <b>Seguradora:</b> {{$recibo->seguradora}}<br> 
            <b>Tipo de Pagamento:</b> {{$recibo->forma_pagamento}}<br> 
            <b>Nr. Comprovativo:</b> {{$recibo->comprovativo}}<br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        </div>

      </div>



      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Descrição</th>
              <th>Tipo de Operação</th>
              <th>Valor</th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Referente ao pagamento do aviso Nᵒ #{{str_pad($recibo->id, 6, "0", STR_PAD_LEFT)}}</td>
              <td>{{$recibo->operacao}}</td>
              <td>{{number_format(round($recibo->amount,2), 2, ',', ' ')}}</td>
           
            </tr>
           
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br>
      <div class="row">
        <p class="col-xs-12">
          <b>
          Valor por extenso: 
          </b>
          {{$recibo->extenso}}.
        </p>
      </div>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-4">
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
          </div>
        </div>
      </div>
      <div class="row">
      
        <div class="col-xs-12" align="right">
        <p>__________________________</p>
         <p style="margin-right: 50px">(Assinatura)</p> 
        </div>
      </div>


    </section>

</page>


    
    <section class="invoice">
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        <button onclick="printDiv('printableArea')" class="btn btn-default">
          <i class="fa fa-print fa-1x" aria-hidden="true"></i> Imprimir
        </button>

          <a href="{{ url ('admin/clientes/financas/extrato', $recibo->cliente_token_id)}}" class="btn btn-success pull-right"><i class="fa fa-pie-chart"></i> Extrato</a>

          <a href="{{url('admin/financas/recibos/recibo/pdf',$recibo->token_id)}}" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </a>
        </div>
      </div>
    </section>
      
    </div>                                                                                                                                       

@stop

