@extends('adminlte::page')

@section('title', 'Adicionar Prospecção')

@section('content_header')

    <h1><a class="btn btn-primary"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
    
   
@stop

@section('content')

          <!-- general form elements -->
          <div class="box box-solid box-success">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Adicionar Prospecção</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('prospecoes.store') }}">
                            @csrf
                        <div class="box-body">
                                <div class="row">
                                <div class="col-xs-4">
                                    <label for="NomeCliente"><i class="fa fa-user"></i> Nome Cliente</label>
                                    <input class="form-control" name="nome_cliente" placeholder="Hingridy Camisa" type="tex">
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Nome Consultor</label>
                                        <select class="form-control" name="nome_consultor">
                                            @foreach($consultors as $cons)
                                            <option>{{ $cons->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Tipo de Cliente</label>
                                        <select class="form-control" name="tipo_cliente">
                                            <option><i class="fa fa-user"></i>Individual</option>
                                            <option><i class="fa fa-institution"></i>Empresa</option>
                                        </select>
                                </div>
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-fw fa-map-pin"></i> Endereço </label>
                                    <input class="form-control" name="endereco_cliente" placeholder="Endereço do cliente " type="text">
                                            
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-phone"></i> Contacto Cliente</label>
                                    <input class="form-control" name="contacto_cliente" placeholder="Contacto cliente " type="text">      
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-phone"></i>Pessoa Contacto</label>
                                    <input class="form-control" name="pessoa_contacto" placeholder="Pessoa Contacto "  type="text">      
                                    </div>
                                   
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="DetalhesProspecao"><i class="fa fa-envelope"></i> Email</label>
                                    <input class="form-control" name="email_cliente" placeholder="Email cliente " type="email">
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="DataInicio"><i class="fa fa-calendar"></i> Data Início </label>
                                        <input class="form-control " name="data_inicio"  type="date">
                                    
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="DataPrevistaFim"><i class="fa fa-calendar"></i> Data Prevista Fim </label>
                                        <input class="form-control" name="data_prevista_fim"  type="date">
                                    </div>
                                </div> <br>
                                

                                <div class="row">
                                    <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Ramo </label>
                                        <select class="form-control" name="tipo_prospecao">
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

                                         <div class="col-xs-3">
                                        <label><i class="fa fa-map-pin"></i> Origem Prospecção </label>
                                        <select class="form-control" name="origem_prospecao">
                                            <option>Indefinido</option>
                                            <option>Corretora</option>
                                            <option>Indicado</option>
                                            <option>Site</option>
                                            <option>Jornal</option>
                                            <option>Outros</option>
                                        </select>
                                        </div>


                                         <div class="col-xs-3">
                                        <label><i class="fa fa-briefcase"></i> Estado Prospecção </label>
                                        <select class="form-control" name="estado">
                                            <option>Espera da Cotação  (Seguradora)</option>
                                            <option>Preenchimento de formulário</option>
                                            <option>Em Espera (Negociação com o cliente)</option>
                                            <option>Cotação  enviada para o cliente</option>
                                            <option>Perdida</option>
                                            <option>Assinado(Tornar Contrato)</option>
                                            
                                        </select>
                                        </div>
                                        
                                        <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Valor Estipulado da Carteira </label>
                                        <input class="form-control" name="valor_estipulado_carteira" placeholder="Valor estipulado " type="double">
                                        </div>
                                </div>
                                
                                 <br>
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Prospecção</label>
                                    <textarea class="form-control" name="detalhes_prospecao" rows="3" placeholder="Detalhes ..." ></textarea>
                                
                                   <!-- <input class="form-control" name="detalhes_prospecao" placeholder="Detalhes da Prospecção " type="text"> -->
                                </div>
                        </div>
                        <!-- /.box-body -->

                            <div class="box-footer">
                            
                                <center><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submeter</button></center>
                                
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