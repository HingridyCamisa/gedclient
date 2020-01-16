@extends('adminlte::page')

@section('title','Aviso')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/contrato/index') }}"><i class="fa fa-fw fa-arrow-left"></i> </a>
    </h1>

@stop

@section('content')
<page id="printableArea" name="printableArea">  
<div class="box box-solid box-danger">
            <div class="box-header">
                        <center><h3 class="box-title"><strong><i class="fa fa-fw fa- fa-fax"></i> Aviso de Cobrança </strong></h3></center>
            </div>

            <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             AMANA SEGUROS
            <small class="pull-right">Data: 11/01/2020</small>
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
          <b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Aviso Nᵒ  #007612</b>
          
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
            <b> Segurado/ Insured:</b> M0000<br>
            <b> Endereço:</b> Ahmed Zeinul<br>
            <b> Cidade:</b> Av. 25 de Setembro<br><br>
            <b>Localidade / City:</b> Maputo<br>
            <b>NUIT/ Tax payer Nᵒ</b> <br><br>
            <b>Seguradora:</b> ARKO <br>
            <b>Nᵒ Apólice:</b> MABO09903129<br>
            <b>Periodicidade de Pagamento:</b> Anual<br>
            <b>Periodo de Seguro de:</b> 00/01/100<br>
            <b>Periodo Efectivo de Débito:</b> 00/01/1900<br>
            <b>Data Limite Pagamento:</b> 30 Dias<br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <br>  
            <b>Nᵒ de Conta:</b> 1111111<br>
            <b>Data / Date:</b> Beira<br><br>
            <b>Nᵒ Ref. Seguradora :</b> 1111111<br>
            <b>Insure Ref.ᵒ :</b> 243<br><br><br>
            <b>Renovação :</b> 1111111<br><br>
            <b>Até :</b> 00/01/1900<br>
            <b>Até :</b> 30/01/1900<br>
            <b>Referência AMANA :</b> 243<br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        </div>
      
      </div>

    </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Descrição</th>
              <th>Pagamento</th>
              <th>Seguradora</th>
              <th>Valor</th>
            
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Referente ao pagamento de</td>
              <td>Mensal</td>
              <td>Arko</td>
              <td>3,500.00</td>
            </tr>
            <tr>
              <td>Referente ao pagamento de</td>
              <td>Mensal</td>
              <td>Arko</td>
              <td>3,500.00</td>
            </tr>
            <tr>
              <td>Referente ao pagamento de</td>
              <td>Mensal</td>
              <td>Arko</td>
              <td>3,500.00</td>
            </tr>
            <tr>
              <td>Referente ao pagamento de</td>
              <td>Mensal</td>
              <td>Arko</td>
              <td>3,500.00</td>
            </tr>
            <tr>
              <td>Referente ao pagamento de</td>
              <td>Mensal</td>
              <td>Arko</td>
              <td>3,500.00</td>
            </tr>
           
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
        <!-- /.col -->
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
</page>
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

