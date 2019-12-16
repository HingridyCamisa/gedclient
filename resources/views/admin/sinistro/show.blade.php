

@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/sinistro/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
@stop

@section('content')

          <div class="box  box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-fw fa-subway"></i> Detalhes do Sinistro</strong> <i>{{ $sinistros->sinistro}}</i> <strong> do Segurado </strong> <i> {{$sinistros->nome_segurado}} </i></h3></center>
         </div>
    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $sinistros->id }}</td>
        </tr>
        <tr>
          <th>Sinistro</th>
          <td><i class="fa fa-subway"></i> &nbsp; {{ $sinistros->sinistro }}</td>
        </tr>
        <tr>
          <th>Segurado</th>
          <td><i class="fa fa-user"></i> &nbsp; {{ $sinistros->nome_segurado }}</td>
        </tr>
        <tr>
          <th>Seguradora</th>
          <td><i class="fa fa-institution"></i> &nbsp; {{ $sinistros->seguradora }}</td>
        </tr>
        <tr>
          <th> Nº Apólice </th>
          <td><i class="fa fa-file-text"></i> &nbsp; {{ $sinistros->numero_apolice }}</td>
        </tr>
        <tr>
          <th>Data Sinistro</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($sinistros->data_sinistro)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Participação Almond </th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($sinistros->data_participacao_almond)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Participação Seguradora </th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($sinistros->data_participacao_seguradora)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Pagamento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($sinistros->data_pagamento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Valor Sinistro</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $sinistros->valor_sinistro}}</td>
        </tr>
        <tr>
          <th>Valor Pago Seguradora</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $sinistros->valor_pago_seguradora}}</td>
        </tr>
        <tr>
          <th>Franquia</th>
          <td><i class="fa fa-balance-scale"></i> &nbsp; {{ $sinistros->franquia}}</td>
        </tr>
        <tr>
          <th> Valor Franquia</th>
          <td><i class="fa fa-balance-scale"></i> &nbsp; {{ $sinistros->valor_franquia}}</td>
        </tr>
        <tr>
          <th> Consultor</th>
          <td><i class="fa fa-user"></i> &nbsp; {{ $sinistros->consultor}}</td>
        </tr>
        <tr>
          <th>Nº de Dias  </th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $sinistros->numero_dias}}</td>
        </tr>
        <tr>
          <th>Situação  </th>
          <td><i class="fa fa-warning"></i> &nbsp; {{ $sinistros->situacao}}</td>
        </tr>
        <tr>
          <th>Detalhes </th>
          <td><i class="fa fa-info"></i> &nbsp; {{ $sinistros->detalhes}}</td>
        </tr>
      </tbody>
    </table>
      
   



@stop