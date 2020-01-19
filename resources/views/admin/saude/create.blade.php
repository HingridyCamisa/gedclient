@extends('adminlte::page')

@section('title', 'Adicionar Contrato Saúde')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/saude/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
   
@stop

@section('content')
@include('notification')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-medkit"></i> Adicionar Saúde:  {{$cliente->cliente_nome}}</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('saude.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                <input type="hidden" name="client_id" value="{{$cliente->id}}" />
                <input type="hidden" name="client_token" value="{{$cliente->token_id}}" />
              <div class="box-body">
                    <div class="row">

                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" name="consultor">
                                            <option  value="{{old('consultor')}}" selected disabled> Select</option>
                                            @foreach($consultor as $consultor)
                                            <option value="{{ $consultor->id}}"> {{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                </div>
                        
                                <div class="col-xs-3">
                                 <label><i class="fa fa-users"></i> Nome do Grupo</label>
                                 <input class="form-control" name="nome_grupo" placeholder="Nome do Grupo" type="text">
                                    
                                </div>
                                 <div class="col-xs-3">
                                 <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control" name="nome_seguradora">
                                            <option  value="" selected disabled> Select</option>
                                            @foreach($seguradora as $seguradora)
                                            <option value="{{ $seguradora->id}}">{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-xs-3">
                                    <label for="Contacto"><i class="fa fa-list-alt"></i> Plano</label>
                                    <input class="form-control" name="plano" placeholder="Plano de Saúde" type="text">
                                </div>

                                
                    </div><br>
                    <div class="row">

                                
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-venus-mars"></i> Tipo de Membro</label>
                                    <select class="form-control" name="tipo_membro" id="tipo_membro" onchange="tipomembro(this.value)">
                                            <option value="" selected disabled> Select</option>
                                            <option value="Policy Holder" >Policy Holder</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Child">Child</option>
                                        </select> 
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-key"></i> Número de Membro</label>
                                    <input class="form-control" name="numero_membro" placeholder="Numero de membro" type="text">
                                </div>

                                <div class="col-xs-3">
                                 <label><i class="fa fa-money"></i> Prémio Total</label>
                                 <input class="form-control" name="premio_total" placeholder="Prémio Total" type="float">
                                    
                                </div>
                                <div class="col-xs-3">
                                 <label><i class="fa fa-money"></i> Prémio Simples</label>
                                 <input class="form-control" name="premio_simples" placeholder="Prémio Simples" type="float">
                                    
                                </div>

                                
                    </div><br>
                    <div class="row">
                                
                                <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Inicio Cobertura</label>
                                    <input class="form-control" name="data_inicio" type="date">
                                </div>
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Fim Cobertura</label>
                                    <input class="form-control" name="data_proximo_pagamento"  type="date">
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-hourglass-2"></i> Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option  value="{{old('periodicidade_pagamento')}}" selected disabled> {{old('periodicidade_pagamento','Select')}}</option>
                                            <option value="Mensal">Mensal</option>
                                            <option value="Trimestral">Trimestral</option>
                                            <option value="Semestral">Semestral</option>
                                            <option value="Anual">Anual</option>
                                            <option value="Não Renovável">Não Renovável</option>
                                     </select>
                                </div>
                                <div class="col-xs-3">
                                    <label><i class="fa fa-calculator"></i> Taxa Corretagem</label>
                                    <input class="form-control" name="taxa_corretagem" placeholder="Taxa Corretagem " type="float">
     
                                </div>

                    </div><br>
                    <div class="row">
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
                                 <label><i class="fa fa-user"></i> Segurado/Membro principal</label>
                                        <select class="form-control desabilitar_principal" name="menbro_principal" disabled>
                                            <option  value="" selected disabled> Select</option>
                                            @foreach($saudes as $menbros)
                                            <option value="{{$menbros->id}}">{{$menbros->cliente->cliente_nome}}-{{$menbros->numero_membro}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                  
                                    
                        </div><br>
                        <div class="form-group">
                            <label for="DetalhesProspecao"><i class="fa fa-info"></i> Notas</label>
                            <textarea class="form-control" name="notas" rows="2" placeholder="Notas ..." value="{{old('notas')}}"></textarea>
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


<script>
    $(document).ready(function () {
        $data = $("#tipo_membro").val();
        if ($data=='Policy Holder') {
            $(".desabilitar_principal *").removeAttr('disabled');
            $(".desabilitar_principal").removeAttr('disabled');
        } else if($data=='Empresa') {
            $(".desabilitar_principal").prop('disabled', true);
            $(".desabilitar_principal *").prop('disabled', true);
        }
    });

    function tipomembro(val) {
        if (val!='Policy Holder') {
            $(".desabilitar_principal *").removeAttr('disabled');
            $(".desabilitar_principal").removeAttr('disabled');
        } else {
            $(".desabilitar_principal").prop('disabled', true);
            $(".desabilitar_principal *").prop('disabled', true);
            $(".desabilitar_principal").val('');

        }
        
    }
</script>

@stop