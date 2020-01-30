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
                                        <select class="form-control" name="nome_seguradora">
                                            <option   selected disabled> select..</option>
                                            @foreach($seguradora as $seguradora)
                                            <option value="{{ $seguradora->id}}">{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                    <div class="col-xs-3">
                                    <label for="Numero Apolice"><i class="fa fa-fw fa-file-text-o"></i> Nº Apólice </label>
                                    <input class="form-control" name="numero_apolice" placeholder="Numero Apólice " type="text" value="{{$contrato->numero_apolice}}">
                                            
                                    </div>

                                    <div class="col-xs-3">
                                    <label> Ramo </label>
                                            <select class="form-control" name="tipo_ramo">
                                                <option   selected disabled> select</option>
                                                @foreach($ramos as $ramo)
                                                <option value="{{ $ramo->id}}"> {{ $ramo->ramo}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Periodicidade Pagamento"><i class="fa fa-hourglass-2 "></i> Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option  value="{{$contrato->periodicidade_pagamento}}" selected disabled> {{$contrato->periodicidade_pagamento}}</option>
                                            <option value="Mensal">Mensal</option>
                                            <option value="Trimestral">Trimestral</option>
                                            <option value="Semestral">Semestral</option>
                                            <option value="Anual">Anual</option>
                                            <option value="Não Renovável">Não Renovável</option>
                                        </select>
                                    </div>

                                
                                </div><br> 



                    <div class="row">
                                    

                    <div class="col-xs-3">
                        <label><i class="fa fa-user"></i> Consultor </label>
                        <select class="form-control" name="consultor">
                                <option   selected disabled> select</option>
                            @foreach($consultores as $consultor)
                            <option value="{{ $consultor->id}}"> {{ $consultor->nome_consultor}}</option>
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
                    <div class="col-xs-3">
                        <label><i class="fa fa-money"></i> Capital Seguro </label>
                        <input class="form-control capital_seguro" name="capital_seguro"  placeholder="Capital Seguro "type="float" value="{{$contrato->capital_seguro}}" disabled>
                    </div>
                                
                                   
                </div><br>
                                
                    <div class="row">

                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Prémio Total </label>
                            <input class="form-control" id="premio_total" name="premio_total" placeholder="Premio Total " type="float" value="{{$contrato->premio_total}}">
                        </div>
                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Prémio Simples</label>
                            <input class="form-control" id="premio_simples" name="premio_simples" placeholder="Premio Simples " type="float" value="{{$contrato->premio_simples}}">
     
                        </div>
                                     
                        <div class="col-xs-3">
                            <label> % Taxa Corretagem</label>
                            <input class="form-control" id="taxa_corretagem" name="taxa_corretagem"  type="float" value="{{$contrato->taxa_corretagem}}">
     
                        </div>

                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Comissão Corretagem</label>
                            <input class="form-control" id="comissao" name="comissao" placeholder="Comissão corretagem "  >
     
                        </div>

                    </div> <br>
                                

                    <div class="row">

                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Custo Administrativo</label>
                            <input class="form-control" name="custo_admin"  placeholder="Custo administrativo "type="double" value="{{$contrato->custo_admin}}">
     
                        </div>   

                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Imposto de Selo</label>
                            <input class="form-control" name="imposto_selo"  placeholder="Imposto sebre selo"type="double" value="{{$contrato->imposto_selo}}">
                        </div>
                        
                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Sobre Taxa</label>
                            <input class="form-control" name="sobre_taxa"  placeholder="Imposto sobre taxa "type="double" value="{{$contrato->sobre_taxa}}">
                        </div>
                                

                    </div> <br>

                    <div class="row">

                    <div class="col-xs-3">
                            <label><i class="fa fa-info"></i> Item Segurado </label>
                            <input class="form-control" name="item_segurado"  placeholder="Item Segurado "type="text" value="{{$contrato->item_segurado}}">
                        </div>

                                   
                        <div class="col-xs-3">
                            <label><i class="fa fa-money"></i> Situação</label>
                            <select class="form-control" name="situacao">
                                <option  value="{{$contrato->situacao}}" selected disabled> {{$contrato->situacao}}</option>
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



    <script type="text/javascript">
        function ramo(val) {
        if (val=='Automóvel - Responsabilidade Civil') {
            $(".capital_seguro").removeAttr('disabled');
        } else {
            $(".capital_seguro").prop('disabled', true);
            $(".capital_seguro").val('');
        }
        
        }


                
    $(document).ready(function(){

        $('#taxa_corretagem').keyup(function(){

            var taxa_corretagem = $('#taxa_corretagem').val();
            var premio_simples = $('#premio_simples').val();
            var total=(parseFloat(taxa_corretagem)/100)*parseFloat(premio_simples);
            $('#comissao').val(total);

        });

        $('#premio_simples').keyup(function(){

            var taxa_corretagem = $('#taxa_corretagem').val();
            var premio_simples = $('#premio_simples').val();
            var total=(parseFloat(taxa_corretagem)/100)*parseFloat(premio_simples);
            $('#comissao').val(total);

        });
    });
    </script>
@stop