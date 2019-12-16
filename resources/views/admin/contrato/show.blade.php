@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
@stop

@section('content')

          <div class="box box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes Contrato do Segurado </strong> <i> {{$contrato->nome_segurado}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $contrato->id}}</td> 
        </tr>
        <tr>
          <th>Nome Consultor</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$contrato->consultor }}</td>
        </tr>
        <tr>
          <th>Nome Seguradora</th>
          <td><i class="fa fa-institution"></i> &nbsp; {{$contrato->nome_seguradora }}</td>
        </tr>
        <tr>
        <tr>
          <th>Nome Segurado</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$contrato->nome_segurado }}</td>
        </tr>
        <tr>
          <th>Nº Apólice</th>
          <td><i class="fa fa-fw fa-user"></i> &nbsp; {{$contrato->numero_apolice }}</td>
        </tr>
        <tr>
        <tr>
          <th>Nº Recibo</th>
          <td><i class="fa fa-fw fa-user"></i> &nbsp; {{$contrato->numero_recibo }}</td>
        </tr>
        <tr>
        <tr>
          <th>Ramo</th>
          <td><i class="fa fa-fw fa-map-pin"></i> &nbsp; {{$contrato->tipo_seguro }}</td>
        </tr>
        <tr>
          <th>Periodicidade Pagamento</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$contrato->periodicidade_pagamento }}</td>
        </tr>
        <tr>
          <th>Data Início</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($contrato->data_inicio)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Próximo  Pagamento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($contrato->data_proximo_pagamento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Dias Cobertos</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $contrato->dias_cobertos }}</td>
        </tr>
        <tr>
          <th>Data Próximo  Pagamento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $contrato->dias_proximo_pagamento }}</td>
        </tr>
        <tr>
          <th>Capital Seguro</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->capital_seguro, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Prémio Total</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->premio_total, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Prémio Simples</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->premio_simples, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Comissão Corretagem</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->comissao, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Taxa Corretagem</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->taxa_corretagem}}  </td>
        </tr>
        <tr>
          <th>Item Segurado</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->item_segurado}}  </td>
        </tr>
        <tr>
          <th>Situação</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->situacao}}  </td>
        </tr>

        <tr>
          <th>Detalhes Item Segurado</th>
          <td><i class="fa fa-info"></i> &nbsp; {{$contrato->detalhes_item_segurado}}</td>
        </tr>
        <tr>
          <th>Estado Contrato</th>
          @if(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->isPast())         
          <td><i class="fa fa-close text-red"></i> Expirado</td>
          @else
           <td><i class="fa fa-check text-green"></i> Em dia</td>
           @endif

        </tr>
      </tbody>
    </table>               <!-- /.box-header -->


@stop