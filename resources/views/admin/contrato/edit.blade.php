@extends('adminlte::page')

@section('title', 'Editar Contrato')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
   
@stop

@section('content')
@include('notification')

<div class="box box-solid box-danger">
    <div class="box-header with-border">
            <center><h3 class="box-title"><strong><i class="fa fa-folder-open"></i> Editar Contrato: {{$contrato->cliente->cliente_nome }}</strong></h3></center>
    </div>
    <!-- /.box-header -->
                        <!-- form start -->
            <form role="form" method="POST" action="{{ route('contratos.update', $contrato['id'])}}">
                 @csrf
                <div class="box-body">
                            
                    <div class="row">
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control"  name="nome_seguradora">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($seguradora as $seguradora)
                                            <option value="{{ $seguradora->id}}">{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Tipo Seguro</label>
                                        <select class="form-control" name="tipo_ramo" >
                                            <option value="{{$contrato->tipo_ramo}}" selected >{{$contrato->tipo_ramo}}</option>
                                            <option value="Acidentes Pessoais">Acidentes Pessoais</option>
                                            <option value="Acidente de Trabalho">Acidente de Trabalho</option>
                                            <option value="Automóvel - Responsabilidade Civil">Automóvel - Responsabilidade Civil</option>
                                            <option value="Automóvel - Danos Próprios">Automóvel - Danos Próprios</option>
                                            <option value="Garantia">Garantia</option>
                                            <option value="Recheio">Recheio</option>
                                            <option value="Saúde">Saúde</option>
                                            <option value="Mercadoria">Mercadoria</option>
                                            <option value="Multirriscos">Multirriscos</option>
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                <label for="Numero Apolice"><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice </label>
                                <input class="form-control" name="numero_apolice" value="{{ $contrato->numero_apolice}}" placeholder="Numero Apólice " type="text">         
                            </div>

                            <div class="col-xs-3">
                                <label for="Numero Recibo"><i class="fa fa-file-text-o"></i> Nº Recibo</label>
                                <input class="form-control" name="numero_recibo" value="{{ $contrato->numero_recibo}}" placeholder="Numero Recibo " type="text">      
                            </div>

                    </div>
                            <br>

                    <div class="row">
                            
                            <div class="col-xs-3">
                                <label for="Periodicidade Pagamento"><i class="fa fa-hourglass-2 "></i> Periodicidade de Pagamento</label>
                                <select class="form-control" name="periodicidade_pagamento">
                                            <option value="{{ $contrato->periodicidade_pagamento}}" selected>{{ $contrato->periodicidade_pagamento}}</option>
                                            <option value="Mensal">Mensal</option>
                                            <option value="Trimestral">Trimestral</option>
                                            <option value="Semestral">Semestral</option>
                                            <option value="Anual">Anual</option>
                                            <option value="Não Renovável">Não Renovável</option>
                                            
                                </select>
                            </div>

                            <div class="col-xs-3">
                                <label><i class="fa fa-user"></i> Consultor </label>
                                        <select class="form-control" name="consultor" >
                                            <option value="" disabled selected>select</option>
                                            @foreach($consultor as $consultor)
                                            <option value="{{ $consultor->id}}">{{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                            </div>


                            <div class="col-xs-3">
                                <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Início do Seguro</label>
                                 <input class="form-control" name="data_inicio" value="{{ $contrato->data_inicio}}" placeholder="Data Inicio" type="date">
                            </div>
                            
                            <div class="col-xs-3">
                                <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Próximo  Pagamento </label>
                                <input class="form-control " name="data_proximo_pagamento" value="{{ $contrato->data_proximo_pagamento}}" type="date">
                                    
                            </div>

                            
                    </div> 
                            <br>

                    <div class="row">
                            <div class="col-xs-3">
                                <label for="Dias_Proximo_Pagamento"><i class="fa fa-calendar"></i> Dias Próximo  Pagamento </label>
                                    <input class="form-control" name="dias_proximo_pagamento" value="{{ $contrato->dias_proximo_pagamento}}" type="text">
                             </div>
                             <div class="col-xs-3">
                                <label for="Dias_Cobertos"><i class="fa fa-calendar"></i> Dias Cobertos </label>
                                    <input class="form-control " name="dias_cobertos" value="{{ $contrato->dias_cobertos}}" type="text">
                            </div>
                             <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Capital Seguro </label>
                                    <input class="form-control" name="capital_seguro" value="{{ $contrato->capital_seguro}}"  placeholder="Capital Seguro "type="float">
                            </div>

                            <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Prémio Total </label>
                                        <input class="form-control" name="premio_total" value="{{ $contrato->premio_total}}" placeholder="Premio Total " type="float">
                            </div>

                    </div>
                                 <br>
                                

                    <div class="row">

                            <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Prémio Simples</label>
                                        <input class="form-control" name="premio_simples" value="{{ $contrato->premio_simples}}" placeholder="Premio Simples " type="float">
                            </div>

                            <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Comissão Corretagem</label>
                                        <input class="form-control" name="comissao" value="{{ $contrato->comissao}}" placeholder="Comissão corretagem " type="float">
                            </div>

                            <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Taxa Corretagem</label>
                                <input class="form-control" name="taxa_corretagem" value="{{ $contrato->taxa_corretagem}}"  type="float">
     
                            </div>
                    </div>
                                
                                 <br>

                    <div class="row">

                            <div class="col-xs-3">
                                <label><i class="fa fa-info"></i> Item Segurado </label>
                                        <input class="form-control" name="item_segurado" value="{{ $contrato->item_segurado}}" placeholder="Item Segurado "type="text">
                            </div>

                           
                            <div class="col-xs-3">
                                <label><i class="fa fa-money"></i> Situação</label>
                                        <select class="form-control" name="situacao" >
                                            <option value="{{ $contrato->situacao}}" selected>{{ $contrato->situacao}}</option>
                                            <option value="Pago">Pago</option>
                                            <option value="Em Cobrança">Em Cobrança</option>
                                        </select>
     
                             </div>

                           
                                    
                    </div>
                                
                                 <br>
                                
                               
                            <div class="form-group">
                                <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Item Segurado</label>
                                <textarea class="form-control" name="detalhes_item_segurado"rows="2" placeholder="Detalhes ..." >{{ $contrato->detalhes_item_segurado}}</textarea>
                            </div>
                </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                                
                                <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                        </div>
                           
            </form>

    
        
</div> <!-- /.box -->
@stop