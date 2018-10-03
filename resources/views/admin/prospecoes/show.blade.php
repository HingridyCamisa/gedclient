@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-primary"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
    
@stop

@section('content')
          <!-- general form elements -->
          <div class="box box-solid box-success">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes Prospecção do Cliente </strong> <i> {{$prospecao->nome_cliente}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $prospecao->id}}</td> 
        </tr>
        <tr>
          <th>Nome Cliente</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$prospecao->nome_cliente }}</td>
        </tr>
        <tr>
          <th>Nome Consultor</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$prospecao->nome_consultor }}</td>
        </tr>
        <tr>
          <th>Tipo Cliente</th>
          <td><i class="fa fa-fw fa-user"></i> &nbsp; {{$prospecao->tipo_cliente }}</td>
        </tr>
        <tr>
        <tr>
          <th>Endereço Cliente</th>
          <td><i class="fa fa-fw fa-map-pin"></i> &nbsp; {{$prospecao->endereco_cliente }}</td>
        </tr>
        <tr>
          <th>Contacto Cliente</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$prospecao->contacto_cliente }}</td>
        </tr>
        <tr>
          <th>Email Cliente</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$prospecao->email_cliente }}</td>
        </tr>
        <tr>
          <th>Data Início</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_inicio)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Prevista Fim</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_prevista_fim)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Ramo</th>
          <td>&nbsp;{{$prospecao->tipo_prospecao }}</td>
        </tr>
        <tr>
          <th>Origem Prospecção</th>
          <td><i class="fa fa-map-pin"></i> &nbsp; {{$prospecao->origem_prospecao }}</td>
        </tr>
        <tr>
          <th>Estado Prospecção</th>
          <td><i class="fa fa-briefcase"></i> &nbsp; {{$prospecao->estado }}</td>
        </tr>
        <tr>
          <th>Valor Estipulado Carteira</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($prospecao->valor_estipulado_carteira, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Detalhes Prospecção</th>
          <td><i class="fa fa-info"></i> &nbsp; {{$prospecao->detalhes_prospecao }}</td>
        </tr>
        <tr>
          <th>Estado Prospecção</th>
          @if(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->isPast())         
          <td><i class="fa fa-close text-red"></i> Expirada</td>
          @else
           <td><i class="fa fa-check text-green"></i> Em dia</td>
           @endif

        </tr>

      </tbody>
    </table>

              

@stop