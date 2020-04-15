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
                        <form role="form" method="POST" id="contratos" action="javascript:void(0)"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                            <input type="hidden" name="client_id" value="{{$cliente->id}}" />
                            <input type="hidden" name="client_token" value="{{$cliente->token_id}}" />
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
                                    <input class="form-control" name="numero_apolice" placeholder="Numero Apólice " type="text" value="{{old('numero_apolice')}}">
                                            
                                    </div>

                                    <div class="col-xs-3">
                                    <label> Ramo </label>
                                            <select class="form-control" name="tipo_ramo" onchange="ramo(this.value)">
                                                <option   selected disabled> select</option>
                                                @foreach($ramos as $ramo)
                                                <option value="{{$ramo->id}}"> {{$ramo->ramo}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="Periodicidade Pagamento"><i class="fa fa-hourglass-2 "></i> Periodicidade de Pagamento</label>
                                    <select class="form-control" name="periodicidade_pagamento">
                                            <option  value="{{old('periodicidade_pagamento')}}" selected disabled> {{old('periodicidade_pagamento','Select')}}</option>
                                            <option value="Mensal">Mensal</option>
                                            <option value="Trimestral">Trimestral</option>
                                            <option value="Semestral">Semestral</option>
                                            <option value="Anual">Anual</option>
                                            <option value="Nao Renovavel">Não Renovável</option>
                                        </select>
                                    </div>

                                
                                </div><br>

                                 <div class="row">
                                    

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-user"></i> Consultor </label>
                                        <select class="form-control" name="consultor">
                                             <option   selected disabled> select</option>
                                            @foreach($consultor as $consultor)
                                            <option value="{{ $consultor->id}}"> {{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                 <div class="col-xs-3">
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Início do Seguro</label>
                                    <input class="form-control" name="data_inicio" placeholder="Data Inicio  " type="date" value="{{old('data_inicio')}}">
                                    </div>
                                
                                    <div class="col-xs-3">
                                    <label for="Data_Inicio"><i class="fa fa-calendar"></i> Data Próximo  Pagamento </label>
                                        <input class="form-control " name="data_proximo_pagamento"  type="date" value="{{old('data_proximo_pagamento')}}">
                                    
                                    </div>
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Capital Seguro </label>
                                        <input class="form-control capital_seguro" name="capital_seguro"  placeholder="Capital Seguro "type="float" value="{{old('capital_seguro')}}" disabled>
                                    </div>
                                
                                   
                                </div><br>

                                 <div class="row">

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Total </label>
                                        <input class="form-control" id="premio_total" name="premio_total" placeholder="Premio Total " type="float" value="{{old('premio_total')}}">
                                    </div>
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Prémio Simples</label>
                                        <input class="form-control" id="premio_simples" name="premio_simples" placeholder="Premio Simples " type="float" value="{{old('premio_simples')}}">
     
                                    </div>

                                                                         
                                    <div class="col-xs-3">
                                        <label> % Taxa Corretagem</label>
                                        <input class="form-control" id="taxa_corretagem" name="taxa_corretagem"  type="float" value="{{old('taxa_corretagem')}}">
     
                                    </div>

                                     <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Comissão Corretagem</label>
                                        <input class="form-control" id="comissao" name="comissao" placeholder="Comissão corretagem "  >
                                    </div>


                                </div>
                                 <br>
                                

                                <div class="row">

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Custo Administrativo</label>
                                        <input class="form-control" name="custo_admin"  placeholder="Custo administrativo "type="text" value="{{old('custo_admin')}}">
     
                                    </div>                                     
                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Imposto de Selo</label>
                                        <input class="form-control" name="imposto_selo"  placeholder="Imposto sebre selo"type="text" value="{{old('imposto_selo')}}">
                                    </div>

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-money"></i> Sobre Taxa</label>
                                        <input class="form-control" name="sobre_taxa"  placeholder="Imposto sobre taxa "type="text" value="{{old('sobre_taxa')}}">
                                    </div>
                                

                                </div>
                                
                                 <br>
                                 <div class="row">

                                 <div class="col-xs-3">
                                        <label><i class="fa fa-info"></i> Item Segurado </label>
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
                                   
                                    
                                </div>
                                
                                 <br>
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Item Segurado</label>
                                    <textarea class="form-control" name="detalhes_item_segurado" rows="2" placeholder="Detalhes ..." value="{{old('detalhes_item_segurado')}}" ></textarea>
                                </div>

                            <hr />
                            <!--
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
                            -->

                        <!-- /.box-body -->
                        <div class="box-footer">
                                
                                <center><button type="submit" id="save" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                            </div>
                           
                        </form>


                      
          </div>
          <!-- /.box --> 


<script>
$(document).on("submit", "#contratos", function (event) {
      event.preventDefault();
      event.stopImmediatePropagation();

      var formData = new FormData(this);
      $('#save').html(' Caregando <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
      $.ajax({
           url: "{{ route('contratos.store') }}",
           type: 'post',
           data: formData,
           success: function (response) {
              if (response.status==false) {
                  toastr.error(response.msg);

              } else if (response.status==true)
                {
                   toastr.success(response.msg);
                }
              else{
                  response.errors.forEach(myFunction);

                  function myFunction(item, index) {
                       toastr.error(item);
                      
                    }
              }
       

            $('#save').html(' Caregar');
           },
           error: function (error) {
            toastr.success('Algo correu mal na sua requisição');
               console.log(error)
           },
           cache: false,
           contentType: false,
           processData: false
      });
      return false;
 });
</script>


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

    <script type="text/javascript">
        function ramo(val) {
        if (val=='4') {
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