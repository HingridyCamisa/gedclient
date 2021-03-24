@extends('adminlte::page')

@section('title','Aviso')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i> </a>

    </h1>

@stop

@section('content')
@include('notification')
 
<div class="box box-solid box-danger">
            <div class="box-header">
                        <center><h3 class="box-title"><strong><i class="fa fa-fw fa- fa-fax"></i> Extrato: {{$extrato[0]->cliente_nome}}</strong></h3></center>
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
          <b><img src="{{asset('/img/amana2.png')}}"   alt="logo" width="180" height="100"></b><br>  
          <br>
          <b>&emsp;&emsp;&emsp;Cliente Nᵒ  M{{str_pad($cliente->id, 6, "0", STR_PAD_LEFT)}}</b>
          
        </div>
        <!-- /.col -->
      </div>

      <br>
      <!-- /.row -->
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
        <address>
            <br>
        <div class="col-xs-12">
          <p class="lead"><strong><i class="fa fa-address-card-o"></i> Dados Do Cliente:</strong></p>

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <b>Nome:</b> {{$cliente->cliente_nome}}<br>  
          </p>
        </div>

         </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        </div>

      </div>
      <hr />



      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Seguradora</th>
              <th>Apolice</th>
              <th>Data Inicio</th>
              <th>Data Fim</th>
              <th>Ramo</th>
              <th>Modalidade</th>
              <th>Premio Total</th>
              <th>Total de Avisos</th>
              <th>Total de Pagamentos</th>
              <th>Premio-Pagamentos</th>
              <th>Avisos-Pagamentos</th>
            
            </tr>
            </thead>
            <tbody>

            @php($t1=0)
            @php($t2=0)
            @php($t3=0)
            @php($t4=0)
            @php($t5=0)
            @foreach($extrato as $key => $aviso)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$aviso->seguradora}}</td>
              <td>{{$aviso->numero_apolice}}</td>
              <td>{{date('d-m-Y',strtotime($aviso->data_inicio))}}</td>
              <td>{{date('d-m-Y',strtotime($aviso->data_fim))}}</td>
              <td>{{$aviso->ramo}}</td>
              <td>{{$aviso->modalidade}}</td>
              <td>{{number_format(round($aviso->premio_total,2), 2, ',', ' ')}}</td>
              <td>{{number_format(round($aviso->fatura,2), 2, ',', ' ')}}</td>
              <td>{{number_format(round($aviso->recibo,2), 2, ',', ' ')}}</td>
              <td>{{number_format(round($aviso->premio_total - $aviso->recibo,2), 2, ',', ' ')}}</td>
              <td>{{number_format(round($aviso->fatura - $aviso->recibo,2), 2, ',', ' ')}}</td>
            @php($t1=$t1+$aviso->premio_total)
            @php($t2=$t2+$aviso->fatura)
            @php($t3=$t3+$aviso->recibo)
            @php($t4=$t4+$aviso->premio_total - $aviso->recibo)
            @php($t5=$t5+$aviso->fatura - $aviso->recibo)
             
            </tr>

            @endforeach
           
            </tbody>
          <tfoot>
            <tr class="table-danger">
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th>Total</th>
              <th>{{number_format(round($t1,2), 2, ',', ' ')}}</th>
              <th>{{number_format(round($t2,2), 2, ',', ' ')}}</th>
              <th>{{number_format(round($t3,2), 2, ',', ' ')}}</th>
              <th>{{number_format(round($t4,2), 2, ',', ' ')}}</th>
              <th>{{number_format(round($t5,2), 2, ',', ' ')}}</th>
              </tr>
          </tfoot>
          </table>
        </div>
        <!-- /.col -->
      </div>
          <hr />
      <!-- /.row -->
      
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
        <!-- /.col -->
          <!--
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>3,500.00</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
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
 
          <!--<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>-->
        </div>
      </div>
    </section>
      
    </div>                                                                                                                                       

@stop

