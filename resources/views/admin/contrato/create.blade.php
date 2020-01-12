@extends('adminlte::page')

@section('title', 'Adicionar Contrato')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
   
@stop

@section('content')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-folder-open"></i> Adicionar Contrato</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('contratos.store') }}">
                            @csrf
                        <div class="box-body">
                             <div class="row">
                                <div class="col-xs-4">
                                    <label for="NomeSegurado"><i class="fa fa-user"></i> Nome Segurado</label>
                                    <input class="form-control" name="nome_segurado" placeholder="Hingridy Camisa" type="text">
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-institution"></i> Endereço Segurado</label>
                                    <input class="form-control" name="endereco" placeholder="Av. Josina Machel" type="text">
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Tipo de Segurado</label>
                                        <select class="form-control" name="tipo_cliente">
                                            <option>Individual</option>
                                            <option>Empresa</option>
                                        </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="Data de Nascimenro"><i class="fa fa-birthday-cake"></i> Data de Nascimento</label>
                                    <input class="form-control" name="data_nascimento" placeholder="Hingridy Camisa" type="date">
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label for="genero"><i class="fa fa-venus-mars"></i> Género</label>
                                    <div class="form-radio">
                                        <label class="radio-inline">
                                            <input type="radio" name="genero" value="1">Femenino
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="genero" value="0">Masculino
                                    </label>
                                </div>   
                             </div>

                             <div class="col-xs-4">
                                    <label for="TipoSegurado"><i class="fa fa-user"></i> Tipo Seguro</label>
                                    <input class="form-control" name="tipo_seguro" placeholder="Aluger de Viaturas" type="text">
    
                             </div>
                                
                            </div><br>

                            <div class="row">
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Pessoa de Contacto</label>
                                    <input class="form-control" name="pessoa_contacto" placeholder="Hingridy Camisa" type="text">
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-phone"></i> Contacto</label>
                                    <input class="form-control" name="contacto_pessoa_contacto" placeholder="Numero de celular" type="text">
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-envelope"></i> Email </label>
                                    <input class="form-control" name="email_pessoa_contacto" placeholder="email" type="email">
                                </div>
                                
                               
                               
                                
                                </div><br>


                                <div class="row">
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control" name="nome_seguradora">
                                            @foreach($seguradora as $seguradora)
                                            <option>{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Ramo</label>
                                        <select class="form-control" name="tipo_seguro">
                                            <option>Acidentes Pessoais</option>
                                            <option>Acidente de Trabalho</option>
                                            <option>Automóvel - Responsabilidade Civil</option>
                                            <option>Automóvel - Danos Próprios</option>
                                            <option>Garantia</option>
                                            <option>Recheio</option>
                                            <option>Saúde</option>
                                            <option>Mercadoria</option>
                                            <option>Multirriscos</option>
                                            
                                        </select>
                                </div>
                                <div class="col-xs-4">
                                        <label><i class="fa fa-user"></i> Consultor </label>
                                        <select class="form-control" name="consultor">
                                            @foreach($consultor as $consultor)
                                            <option>{{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                 </div>
                                
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="Numero Apolice"><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice </label>
                                    <input class="form-control" name="numero_apolice" placeholder="Numero Apólice " type="text">
                                            
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="Numero Recibo"><i class="fa fa-phone"></i> Nº Recibo</label>
                                    <input class="form-control" name="numero_recibo" placeholder="Numero Recibo " type="text">      
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="Periodicidade Pagamento"><i class="fa fa-hourglass-2 "></i>Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option>Mensal</option>
                                            <option>Trimestral</option>
                                            <option>Semestral</option>
                                            <option>Anual</option>
                                            <option>Não Renovável </option>
                                        </select>
                                    </div>
                                   
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-3">
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Início do Seguro</label>
                                    <input class="form-control" name="data_inicio" placeholder="Data Inicio  " type="date">
                                    </div>
                                
                                    <div class="col-xs-3">
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Próximo  Pagamento </label>
                                        <input class="form-control " name="data_proximo_pagamento"  type="date">
                                    
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Dias_Cobertos"><i class="fa fa-money"></i> Dias Cobertos </label>
                                        <input class="form-control " name="dias_cobertos"  type="text">
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Dias_Proximo_Pagamento"><i class="fa fa-money"></i> Dias Próximo  Pagamento </label>
                                        <input class="form-control" name="dias_proximo_pagamento"  type="text">
                                    </div>
                                </div>
                                 <br>
                                

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Capital Seguro </label>
                                        <input class="form-control" name="capital_seguro"  placeholder="Capital Seguro "type="float">
                                    </div>

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Total </label>
                                        <input class="form-control" name="premio_total" placeholder="Premio Total " type="float">
                                    </div>

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Simples</label>
                                        <input class="form-control" name="premio_simples" placeholder="Premio Simples " type="float">
     
                                    </div>

                                     <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Comissão Corretagem</label>
                                        <input class="form-control" name="comissao" placeholder="Comissão corretagem " type="float">
     
                                    </div>
                                </div>
                                
                                 <br>
                                 <div class="row">
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-users"></i> Item Segurado </label>
                                        <input class="form-control" name="item_segurado"  placeholder="Item Segurado "type="text">
                                    </div>

                                   
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Situação</label>
                                        <select class="form-control" name="situacao">
                                            <option>Pago</option>
                                            <option>Em Cobrança</option>
                                        </select>
     
                                    </div>
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Taxa Corretagem</label>
                                        <input class="form-control" name="taxa_corretagem"  type="float">
     
                                    </div>
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-upload"></i> Upload Apólice</label>
                                          <input id="exampleInputFile" type="file">
                                    </div>
                                    
                                </div>
                                
                                 <br>
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Item Segurado</label>
                                    <textarea class="form-control" name="detalhes_item_segurado" rows="2" placeholder="Detalhes ..." ></textarea>
                                </div>
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