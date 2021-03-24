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
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b>Nᵒ Apólice:</b> {{$recibo->numero_apolice}}<br>  
            <b>Seguradora:</b> {{$recibo->seguradora}}<br>
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
              <th>Tipo de Operaçõa</th>
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

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <b>Banco:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;BIM<br>  
          <b>Titular:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Amana Seguros, SA<br>  
          <b>Nᵒ de Conta:</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;415522102 (MZN)<br>
          <b>NIB:</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;00010000041552210257<br>   
          </p>
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
        <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-default"><i class="fa fa-print fa-1x" aria-hidden="true"></i> Imprimir</a>

          <a href="{{ url ('admin/clientes/financas/extrato', $recibo->cliente_token_id)}}" class="btn btn-success pull-right"><i class="fa fa-pie-chart"></i> Extrato</a>

         <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>-->
        </div>
      </div>
    </section>
      
    </div>                                                                                                                                       

@stop

