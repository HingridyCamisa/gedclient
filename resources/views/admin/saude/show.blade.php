@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/saude/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
@stop

@section('content')
          <!-- general form elements -->
          <div class="box box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-medkit"></i> Detalhes Seguro de Saúde do Cliente </strong> <i> {{$saude->nome_segurado}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $saude->id}}</td> 
        </tr>
        <tr>
          <th>Nome Cliente</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->nome_segurado }}</td>
        </tr>
        <tr>
          <th>Data Nascimento</th>
          <td><i class="fa fa-birthday-cake"></i> &nbsp; {{ Carbon\Carbon::parse($saude->data_nascimento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Idade</th>
          <td><i class="fa fa-male"></i> &nbsp; {{$saude->idade }}</td>
        </tr>
        <tr>
          <th>Ano de Nascimento</th>
          <td><i class="fa fa-birthday-cake"></i> &nbsp; {{ $saude->ano_nascimento }}</td>
        </tr>
        <tr>
          <th>Contacto</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$saude->contacto }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$saude->email }}</td>
        </tr>
        <tr>
          <th>Tipo Segurado</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->tipo_segurado }}</td>
        </tr>
        <tr>
          <th>Pessoa Contacto</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Email Pessoa Contacto</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$saude->email_pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Contacto Pessoa Contacto</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$saude->contacto_pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Seguradora</th>
          <td><i class="fa fa-institution"></i> &nbsp; {{$saude->seguradora }}</td>
        </tr>
        <tr>
          <th>Plano</th>
          <td><i class="fa fa-list-alt"></i> &nbsp; {{$saude->plano }}</td>
        </tr>
        <tr>
          <th>Nome Grupo</th>
          <td><i class="fa fa-users"></i> &nbsp; {{$saude->nome_grupo }}</td>
        </tr>
        <tr>
          <th>Tipo Membro</th>
          <td><i class="fa fa-venus-mars"></i> &nbsp; {{$saude->tipo_membro }}</td>
        </tr>
        <tr>
          <th>Número de Membro</th>
          <td><i class="fa fa-key"></i> &nbsp; {{$saude->numero_membro }}</td>
        </tr>
        <tr>
          <th>Data Inicio Cobertura</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($saude->data_inicio_cobertura)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Fim Cobertura</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($saude->data_fim_cobertura)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Periodicidade de Pagamento</th>
          <td><i class="fa fa-hourglass-2"></i> &nbsp; {{$saude->periodicidade_pagamento }}</td>
        </tr>
        <tr>
          <th>Prémio Mensal</th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->premio_mensal }}</td>
        </tr>
        <tr>
          <th>Taxa Corretagem </th>
          <td><i class="fa fa-calculator"></i> &nbsp; {{$saude->taxa_corretagem }}</td>
        </tr>
        <tr>
          <th>Comissão Corretagem </th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->comissao }}</td>
        </tr>
        <tr>
          <th>Situação </th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->situacao}}</td>
        </tr>
        <tr>
          <th>Estado do Seguro de Saúde</th>
          @if(\Carbon\Carbon::parse($saude->data_fim_cobertura)->isPast())         
          <td><i class="fa fa-close text-red"></i> Expirada</td>
          @else
           <td><i class="fa fa-check text-green"></i> Em dia</td>
           @endif

        </tr>



      </tbody>
    </table>

              

@stop