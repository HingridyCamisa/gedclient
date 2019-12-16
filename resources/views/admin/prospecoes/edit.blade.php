@extends('adminlte::page')

@section('title', 'Editar Prospecção')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
   
@stop

@section('content')

<div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-solid box-danger">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Editar Prospecção</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('prospecoes.update', $prospecao['id'])}}">
                            @csrf
                        <div class="box-body">
                                <div class="row">
                                <div class="col-xs-4">
                                    <label for="NomeCliente"><i class="fa fa-user"></i> Nome Cliente</label>
                                    <input class="form-control" name="nome_cliente" placeholder="Hingridy Camisa" type="tex" value="{{$prospecao->nome_cliente}}" class="form-control{{ $errors->has('nome_cliente') ? ' is-invalid' : '' }}" required autofocus>

                                            @if ($errors->has('nome_cliente'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('nome_cliente') }}</strong>
                                                </span>
                                            @endif
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Nome Consultor</label>
                                    <select class="form-control" name="nome_consultor" >
                                            @foreach($consultors as $cons)
                                            <option value="{{$prospecao->nome_consultor}}">{{ $cons->nome_consultor}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('nome_consultor'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('nome_consultor') }}</strong>
                                                </span>
                                            @endif
                                </div>

                                <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Tipo de Cliente</label>
                                    <select class="form-control" name="tipo_cliente">
                                            <option value="{{$prospecao->tipo_cliente}}">Individual</option>
                                            <option value="{{$prospecao->tipo_cliente}}">Empresa</option>
                                        </select>
                                </div>


                         </div>
                         <br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-fw fa-map-pin"></i> Endereço </label>
                                    <input class="form-control" name="endereco_cliente" placeholder="Endereço do cliente " type="text" value="{{$prospecao->endereco_cliente}}" class="form-control{{ $errors->has('endereco_cliente') ? ' is-invalid' : '' }}" required autofocus>
                                             @if ($errors->has('endereco_cliente'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('endereco_cliente') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-phone"></i> Contacto</label>
                                    <input class="form-control" name="contacto_cliente" placeholder="Contacto cliente " type="text" value="{{$prospecao->contacto_cliente}}" class="form-control{{ $errors->has('contacto_cliente') ? ' is-invalid' : '' }}" required autofocus>
                                             @if ($errors->has('contacto_cliente'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('contacto_cliente') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-phone"></i>Pessoa Contacto</label>
                                    <input class="form-control" name="pessoa_contacto" value="{{$prospecao->pessoa_contacto}}" placeholder="Pessoa Contacto "  type="text">      
                                    </div>

                                   
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-envelope"></i> Email</label>
                                    <input class="form-control" name="email_cliente" placeholder="Email cliente " type="email" value="{{$prospecao->email_cliente}}">
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="DataInicio"><i class="fa fa-calendar"></i> Data Início </label>
                                        <input class="form-control " name="data_inicio"  type="date" value="{{$prospecao->data_inicio}}" class="form-control{{ $errors->has('data_inicio') ? ' is-invalid' : '' }}" required autofocus>
                                        @if ($errors->has('data_inicio'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('data_inicio') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="DataPrevistaFim"><i class="fa fa-calendar"></i> Data Prevista Fim </label>
                                        <input class="form-control" name="data_prevista_fim"  type="date" value="{{$prospecao->data_prevista_fim}}" class="form-control{{ $errors->has('data_prevista_fim') ? ' is-invalid' : '' }}" required autofocus >
                                             @if ($errors->has('data_prevista_fim'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('data_prevista_fim') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div> <br>
                                

                                <div class="row">
                                    <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Ramo </label>
                                        <select class="form-control" name="tipo_prospecao" >
                                            <option value="{{$prospecao->tipo_prospecao}}">Acidentes Pessoais</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Acidente de Trabalho</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Automóvel - Responsabilidade Civil</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Automóvel - Danos Próprios</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Garantia</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Recheio</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Saúde</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Mercadoria</option>
                                            <option value="{{$prospecao->tipo_prospecao}}">Multirriscos</option>
                                            
                                        </select>
                                        </div>

                                         <div class="col-xs-3">
                                        <label><i class="fa fa-map-pin"></i> Origem Prospecção </label>
                                        <select class="form-control" name="origem_prospecao" >
                                            <option value="{{$prospecao->origem_prospecao}}">Indefinido</option>
                                            <option value="{{$prospecao->origem_prospecao}}">Corretora</option>
                                            <option value="{{$prospecao->origem_prospecao}}">Indicado</option>
                                            <option value="{{$prospecao->origem_prospecao}}">Site</option>
                                            <option value="{{$prospecao->origem_prospecao}}">Jornal</option>
                                            <option value="{{$prospecao->origem_prospecao}}">Outros</option>
                                        </select>
                                        </div>

                                        <div class="col-xs-3">
                                        <label><i class="fa fa-briefcase"></i> Estado Prospecção </label>
                                        <select class="form-control" name="estado" >
                                            <option value="{{$prospecao->estado}}">Espera da Cotação  (Seguradora)</option>
                                            <option value="{{$prospecao->estado}}">Preenchimento formulário</option>
                                            <option value="{{$prospecao->estado}}">Em Espera (Negociação com o cliente)</option>
                                            <option value="{{$prospecao->estado}}">Cotação enviada para o cliente</option>
                                            <option value="{{$prospecao->estado}}">Perdida</option>
                                            <option value="{{$prospecao->estado}}">Assinado(Tornar Contrato)</option>
                                            
                                        </select>
                                        </div>
                                        
                                        
                                        <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Valor Estipulado da Carteira </label>
                                        <input class="form-control" name="valor_estipulado_carteira" placeholder="Valor estipulado " type="double" value="{{$prospecao->valor_estipulado_carteira}}" class="form-control{{ $errors->has('valor_estipulado_carteira') ? ' is-invalid' : '' }}" required autofocus>
                                            @if ($errors->has('valor_estipulado_carteira'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('valor_estipulado_carteira') }}</strong>
                                                </span>
                                            @endif 
                                        </div>
                                </div>
                                
                                 <br>
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Prospecção</label>
                                    <textarea class="form-control" name="detalhes_prospecao"  rows="3" placeholder="Detalhes ..." class="form-control{{ $errors->has('detalhes_prospecao') ? ' is-invalid' : '' }}" required autofocus>{{$prospecao->detalhes_prospecao}}</textarea>
                                         @if ($errors->has('detalhes_prospecao'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('detalhes_prospecao') }}</strong>
                                                </span>
                                        @endif
                                   <!-- <input class="form-control" name="detalhes_prospecao" placeholder="Detalhes da Prospecção " type="text"> -->
                                </div>
                        </div>
                        <!-- /.box-body -->

                            <div class="box-footer">
                            
                                <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                                
                            </div>
                        </form>
         
          </div>
          <!-- /.box -->
    </div>

@stop