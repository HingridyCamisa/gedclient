

@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-primary"  href="{{ url('admin/segurados/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
@stop

@section('content')

          <div class="box  box-solid box-success">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-fw fa-user"></i> Detalhes do Segurado</strong> <i> {{$segurado->nome_segurado}} </i></h3></center>
         </div>
    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>Data Início</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_inicio)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Prevista Fim</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_prevista_fim)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Tipo Prospecção</th>
          <td>&nbsp;{{$prospecao->tipo_prospecao }}</td>
        </tr>
      </tbody>
    </table>
      
      



@stop