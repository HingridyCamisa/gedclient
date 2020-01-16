@extends('adminlte::page')

@section('title', 'Adicionar Contrato')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
   
@stop

@section('content')
@include('notification')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-folder-open"></i> Adicionar Contrato: {{$cliente->cliente_nome}}</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('contratos.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                            <input type="hidden" name="client_id" value="{{$cliente->id}}" />
                            <input type="hidden" name="client_token" value="{{$cliente->token_id}}" />
                        <div class="box-body">
   


                                <div class="row">
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control" name="nome_seguradora">
                                            <option  value="{{old('nome_seguradora')}}" selected disabled> {{old('nome_seguradora','Select')}}</option>
                                            @foreach($seguradora as $seguradora)
                                            <option value="{{ $seguradora->id}}">{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                    <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Ramo </label>
                                        <select class="form-control" name="tipo_ramo">
                                            <option  value="{{old('tipo_prospecao')}}" selected disabled> {{old('tipo_prospecao','Select')}}</option>
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
                                        <label><i class="fa fa-user"></i> Consultor </label>
                                        <select class="form-control" name="consultor">
                                             <option  value="{{old('consultor')}}" selected disabled> {{old('consultor','Select')}}</option>
                                            @foreach($consultor as $consultor)
                                            <option value="{{ $consultor->id}}"> {{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                 </div>
                                
                                </div><br>

                                 <div class="row">
                                    <div class="col-xs-4">
                                    <label for="Numero Apolice"><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice </label>
                                    <input class="form-control" name="numero_apolice" placeholder="Numero Apólice " type="text" value="{{old('tipo_prospecao')}}">
                                            
                                    </div>
                                    <div class="col-xs-4">
                                    <label for="Numero Recibo"><i class="fa fa-phone"></i> Nº Recibo</label>
                                    <input class="form-control" name="numero_recibo" placeholder="Numero Recibo " type="text" value="{{old('tipo_prospecao')}}">      
                                    </div>

                                    <div class="col-xs-4">
                                    <label for="Periodicidade Pagamento"><i class="fa fa-hourglass-2 "></i>Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option  value="{{old('periodicidade_pagamento')}}" selected disabled> {{old('periodicidade_pagamento','Select')}}</option>
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
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Início do Seguro</label>
                                    <input class="form-control" name="data_inicio" placeholder="Data Inicio  " type="date" value="{{old('data_inicio')}}">
                                    </div>
                                
                                    <div class="col-xs-3">
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Próximo  Pagamento </label>
                                        <input class="form-control " name="data_proximo_pagamento"  type="date" value="{{old('data_proximo_pagamento')}}">
                                    
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Dias_Cobertos"><i class="fa fa-money"></i> Dias Cobertos </label>
                                        <input class="form-control " name="dias_cobertos"  type="text" value="{{old('dias_cobertos')}}">
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Dias_Proximo_Pagamento"><i class="fa fa-money"></i> Dias Próximo  Pagamento </label>
                                        <input class="form-control" name="dias_proximo_pagamento"  type="text" value="{{old('dias_proximo_pagamento')}}">
                                    </div>
                                </div>
                                 <br>
                                

                                <div class="row">
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Capital Seguro </label>
                                        <input class="form-control" name="capital_seguro"  placeholder="Capital Seguro "type="float" value="{{old('capital_seguro')}}">
                                    </div>

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Total </label>
                                        <input class="form-control" name="premio_total" placeholder="Premio Total " type="float" value="{{old('premio_total')}}">
                                    </div>

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Simples</label>
                                        <input class="form-control" name="premio_simples" placeholder="Premio Simples " type="float" value="{{old('premio_simples')}}">
     
                                    </div>

                                     <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Comissão Corretagem</label>
                                        <input class="form-control" name="comissao" placeholder="Comissão corretagem " type="float" value="{{old('comissao')}}">
     
                                    </div>
                                </div>
                                
                                 <br>
                                 <div class="row">
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-users"></i> Item Segurado </label>
                                        <input class="form-control" name="item_segurado"  placeholder="Item Segurado "type="text" value="{{old('item_segurado')}}">
                                    </div>

                                   
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Situação</label>
                                        <select class="form-control" name="situacao">
                                            <option  value="{{old('situacao')}}" selected disabled> {{old('situacao','Select')}}</option>
                                            <option value="Pago">Pago</option>
                                            <option value="Em Cobrança">Em Cobrança</option>
                                        </select>
     
                                    </div>
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Taxa Corretagem</label>
                                        <input class="form-control" name="taxa_corretagem"  type="float" value="{{old('taxa_corretagem')}}">
     
                                    </div>

                                    
                                </div>
                                
                                 <br>
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Item Segurado</label>
                                    <textarea class="form-control" name="detalhes_item_segurado" rows="2" placeholder="Detalhes ..." value="{{old('detalhes_item_segurado')}}" ></textarea>
                                </div>

                            <hr />
                           <div class="row col-md-12" style="margin-left:5px"> 
                                  

                            <h4><i class="fa fa-upload"></i> Upload<a style="color: red">*</a></h4>  
                              <small id="fileHelp" class="form-text text-muted">Por favor carregue o anexo (jpeg,png,pdf) com os todos documentos. E não  superior à 5MB</small>
                              <div class="">
                                <select class="form-control"   id="filetype[]"  name="filetype[]" required autofocus  >
                                   <option disabled selected>Seleciona tipo de ficheiro...</option>
                                            <option value="BI">
                                                BI
                                            </option>                                       
                                            <option value="Apolice de Seguro">
                                                Apolice de Seguro
                                            </option>                                    
                                            <option value="Carta de Condução">
                                                Carta de Condução
                                            </option>                                    
                                            <option value="Carta de Nomeação">
                                                Carta de Nomeação
                                            </option>                                    
                                            <option value="Livrete/Verbete">
                                                Livrete/Verbete
                                            </option>                                    
                                            <option value="Imagem">
                                                Imagem
                                            </option>                                    
                                            <option value="Formulario de Peritagem">
                                                Formulario de Peritagem
                                            </option>                                    
                                            <option value="Passaporte">
                                                Passaporte
                                            </option>                                    
                                            <option value="Comprovativo de pagamento">
                                                Comprovativpo de pagamento
                                            </option>                                   
                                            <option value="Factura">
                                                Factura
                                            </option>                                   
                                            <option value="Recibos">
                                                Recibos
                                            </option>                                    
                                            <option value="Alvará">
                                                Alvará
                                            </option>                                    
                                            <option value="Recibo de Água">
                                                Recibo de Água
                                            </option>                                    
                                            <option value="Certidão">
                                                Certidão
                                            </option>                                    
                                            <option value="Outros">
                                                Outros
                                            </option>
                                </select>
                              </div>
                            <div class="input-group control-group increment" >
                              <input type="file" name="file[]" class="form-control" >
                              <div class="input-group-btn" > 
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus" ></i>Add</button>
                              </div>
          
                            </div>


                            <div class="clone hide" >
                            <div class="control-group">
                              <div class="" style="margin-top:10px">
                                <select class="form-control"   id="filetype[]"  name="filetype[]" required autofocus  >
                                   <option disabled selected>Seleciona...</option>
                                    
                                            <option value="BI">
                                                BI
                                            </option>                                       
                                            <option value="Apolice de Seguro">
                                                Apolice de Seguro
                                            </option>                                    
                                            <option value="Carta de Condução">
                                                Carta de Condução
                                            </option>                                    
                                            <option value="Carta de Nomeação">
                                                Carta de Nomeação
                                            </option>                                    
                                            <option value="Livrete/Verbete">
                                                Livrete/Verbete
                                            </option>                                    
                                            <option value="Imagem">
                                                Imagem
                                            </option>                                    
                                            <option value="Formulario de Peritagem">
                                                Formulario de Peritagem
                                            </option>                                    
                                            <option value="Passaporte">
                                                Passaporte
                                            </option>                                    
                                            <option value="Comprovativo de pagamento">
                                                Comprovativo de pagamento
                                            </option>                                   
                                            <option value="Factura">
                                                Factura
                                            </option>                                   
                                            <option value="Recibos">
                                                Recibos
                                            </option>                                    
                                            <option value="Alvará">
                                                Alvará
                                            </option>                                    
                                            <option value="Recibo de Água">
                                                Recibo de Água
                                            </option>                                    
                                            <option value="Certidão">
                                                Certidão
                                            </option>                                    
                                            <option value="Outros">
                                                Outros
                                            </option>
                                </select>
                              </div>
                              <div class=" input-group" >
                                <input type="file" name="file[]" class="form-control" >          
                                <div class="input-group-btn"> 
                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remover</button>
                                </div>
                              </div>
                            </div>
                            </div>
                           </div>
                        </div>
                            

                        <!-- /.box-body -->
                        <div class="box-footer">
                                
                                <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                            </div>
                           
                        </form>


                      
          </div>
          <!-- /.box --> 


   
<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>


@stop