@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/contrato') }}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Contratos </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Segurado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice</center></th>
          <th scope="col"><center> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Próximo Pagamento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i>  Situação </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>

        </tr>
      </thead>
      <tbody>
      @foreach($contratos as $contrato)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          @if($contrato->consultor)
          <td><center>{{$contrato->consultor }}</center></td>
          @else
           <td><center>{{$contrato->nome_consultor}}</center></td>
          @endif
          @if($contrato->nome_cliente)
          <td><center>{{$contrato->nome_cliente}}</center></td>
          @else
          <td><center>{{$contrato->nome_segurado }}</center></td>
          @endif
          <td><center>{{$contrato->nome_seguradora }}</center></td>
          <td><center>{{$contrato->numero_apolice }}</center></td>
          <td><center>{{$contrato->tipo_seguro }}</center></td>
          <td><center>{{$contrato->data_proximo_pagamento}}</center></td>
          <td><center>{{$contrato->situacao }}</center></td>
          @if(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->isPast())
          <td><center><i class="fa fa-close text-red"></i> Expirado {{\Carbon\Carbon::parse($contrato->data_inicio)->addDays(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->diffInDays($contrato->data_inicio))->diffForHumans()}}</center></td>
          @else
           <td><center><i class="fa fa-check text-green"></i> Em dia {{\Carbon\Carbon::parse($contrato->data_inicio)->addDays(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->diffInDays($contrato->data_inicio))->diffForHumans()}}</center></td>
           @endif
          <td><center><a href="{{ route ('contratos.edit', $contrato->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>

              <a href="{{ route ('contratos.show', $contrato->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
              @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['contrato.destroy', $contrato->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
              <a href="{{ url('/sms') }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-envelope"></i></a>
              </center>
          </td>



      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
            <th scope="col"><center> Nº</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Segurado</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice</center></th>
            <th scope="col"><center> Ramo</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Próximo Pagamento </center></th>
            <th scope="col"><center><i class="fa fa-fw fa-money"></i>  Situação </center> </th>
            <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
            <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>

          </tr>
      </tfoot>
    </table>
   </div>






   <div class="box box-solid box-danger">
            <div class="box-header">
                        <center><h3 class="box-title"><strong><i class="fa fa-fw fa- fa-file-text-o"></i> Recibo </strong></h3></center>
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
          <b><center>Recibo Nᵒ  #007612</center></b>
          
        </div>
        <!-- /.col -->
      </div>

      <br>
      <!-- /.row -->
      <div class="row invoice-info">

        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b>ID Cliente:</b> M0000<br>
            <b>Nome:</b> Ahmed Zeinul<br>
            <b>Morada:</b> Av. 25 de Setembro<br>
            <b>Contacto:</b> 841241274<br>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
        <address>
            <br>
            <b>Nᵒ Apólice:</b> MABO09903129<br>  
            <b>NUIT:</b> 1111111<br>
            <b>Cidade:</b> Beira<br>
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
          <b>Banco:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIM<br>  
          <b>Titular:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amana Seguros, SA<br>  
          <b>Nᵒ de Conta:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;415522102<br>
          <b>NIB:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;00010000041552210257<br>   
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
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
      
    </div>












<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 6, "desc" ]],
        "columnDefs": [
                        { "type": "date-eu", "targets": 6 }
                      ],
        buttons: [
            {
              extend: 'copy',
              text: '<i class="fa fa-files-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'excel',
              text: '<i class="fa fa-file-excel-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'csv',
              text: '<i class="fa fa-file-text-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'pdf',
              text: '<i class="fa fa-file-pdf-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'print',
              text: '<i class="fa fa-fw fa-print"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'colvis',
              text: '<i class="fa fa-fw fa-eye-slash"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
        ]
    } );
} );

</script>


 {{ $contratos->links() }}

@stop
