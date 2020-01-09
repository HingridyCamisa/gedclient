@extends('adminlte::page')

@section('title', 'Adicionar Contrato Saúde')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/saude/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
   
@stop

@section('content')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-medkit"></i> Adicionar Saúde</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('saude.store') }}">
                @csrf
              <div class="box-body">
                     <div class="row">
                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-user"></i> Nome Segurado</label>
                                    <input class="form-control" name="nome_segurado" placeholder="Nome segurado" type="text">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-birthday-cake"></i> Data Nascimento</label>
                                    <input class="form-control" name="data_nascimento"  type="date">
                                </div>

                                <div class="col-xs-3">
                                    <label for="AnoNascimento"><i class="fa fa-birthday-cake"></i> Ano de Nascimento</label>
                                    <input class="form-control" name="ano_nascimento"  type="text">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-male"></i> Idade</label>
                                    <input class="form-control" name="idade" placeholder="Idade segurado" type="text">
                                </div>
                                
                    </div><br>
                    <div class="row">
                                 <div class="col-xs-3">
                                    <label for="Contacto"><i class="fa fa-phone"></i> Contacto</label>
                                    <input class="form-control" name="contacto" placeholder="841111111" type="text">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-envelope"></i> Email</label>
                                    <input class="form-control" name="email"  type="email">
                                </div>

                                <div class="col-xs-3">
                                         <label><i class="fa fa-user"></i> Tipo de Segurado</label>
                                        <select class="form-control" name="tipo_segurado">
                                            <option>Individual</option>
                                            <option>Empresa</option>
                                        </select> 
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" >
                                            @foreach($consultor as $consultor)
                                            <option>{{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                
                    </div><br>
                    <div class="row">
                                 <div class="col-xs-3">
                                    <label for="PessoaContacto"><i class="fa fa-user"></i> Pessoa Contacto</label>
                                    <input class="form-control" name="pessoa_contacto" placeholder="Nome pessoa contacto" type="text">
                                </div>

                                <div class="col-xs-3">
                                    <label for="Contacto"><i class="fa fa-phone"></i> Contacto</label>
                                    <input class="form-control" name="contacto_pessoa_contacto" placeholder="Numero de celular" type="text">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-envelope"></i> Email</label>
                                    <input class="form-control" name="email_pessoa_contacto" placeholder="Email" type="email">
                                </div>

                                <div class="col-xs-3">
                                 <label><i class="fa fa-users"></i> Nome do Grupo</label>
                                 <input class="form-control" name="nome_grupo" placeholder="Nome do Grupo" type="text">
                                    
                                </div>

                                
                    </div><br>
                    <div class="row">
                                 <div class="col-xs-3">
                                 <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control" name="seguradora">
                                            @foreach($seguradora as $seguradora)
                                            <option>{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                    <label for="Contacto"><i class="fa fa-list-alt"></i> Plano</label>
                                    <input class="form-control" name="plano" placeholder="Plano de Saúde" type="text">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-venus-mars"></i> Tipo de Membro</label>
                                    <select class="form-control" name="tipo_membro">
                                            <option>Policy Holder</option>
                                            <option>Spouse</option>
                                            <option>Child</option>
                                        </select> 
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-key"></i> Número de Membro</label>
                                    <input class="form-control" name="numero_membro" placeholder="Numero de membro" type="text">
                                </div>

                                
                    </div><br>
                    <div class="row">
                                <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Inicio Cobertura</label>
                                    <input class="form-control" name="data_inicio_cobertura" type="date">
                                </div>
                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Fim Cobertura</label>
                                    <input class="form-control" name="data_fim_cobertura"  type="date">
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-hourglass-2"></i> Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option>Mensal</option>
                                            <option>Trimestral</option>
                                            <option>Semestral</option>
                                            <option>Anual</option>
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                 <label><i class="fa fa-money"></i> Prémio Mensal</label>
                                 <input class="form-control" name="premio_mensal" placeholder="Prémio Mensal" type="float">
                                    
                                </div>
                    </div><br>
                    <div class="row">

                        <div class="col-xs-3">
                            <label><i class="fa fa-calculator"></i> Taxa Corretagem</label>
                            <input class="form-control" name="taxa_corretagem" placeholder="Taxa Corretagem " type="float">
     
                        </div>

                         <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Comissão Corretagem </label>
                            <input class="form-control" name="comissao"  placeholder="Comissao Corretagem " type="float">
                        </div>

                                   
                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Situação</label>
                                <select class="form-control" name="situacao">
                                    <option>Pago</option>
                                    <option>Em Cobrança</option>
                                </select>
     
                        </div>
                                   
                        <div class="col-xs-3">
                            <label><i class="fa fa-upload"></i> Upload Apólice</label>
                                <input id="exampleInputFile" type="file">
                        </div>
                                    
                        </div><br>
                         
              </div>
              <!-- /.box-body -->

                  <div class="box-footer">
                   
                    <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                    
                  </div>
            </form>
            @if($errors->any())
              <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
           @endif
          </div>
          <!-- /.box -->

  

@stop