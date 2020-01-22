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
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-medkit"></i> Editar Saúde:  {{$saude->cliente->cliente_nome}}</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('saude.update', $saude['id']) }}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                    <div class="row">

                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" name="consultor">
                                            <option  value="{{old('consultor',$saude->consultor)}}" selected disabled> {{old('consultor',$saude->consultorx->nome_consultor)}}</option>
                                            @foreach($consultors as $consultor)
                                            <option value="{{ $consultor->id}}"> {{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                 <label><i class="fa fa-users"></i> Nome do Grupo</label>
                                 <input class="form-control" name="nome_grupo" placeholder="Nome do Grupo" type="text" value="{{ $saude->nome_grupo}}">  
                                </div>

                                <div class="col-xs-3">
                                 <label><i class="fa fa-institution"></i> Nome Seguradora</label>
                                        <select class="form-control" name="nome_seguradora">
                                            <option  value="{{old('nome_seguradora',$saude->nome_seguradora)}}" selected disabled> {{old('nome_seguradora',$saude->seguradora->nome_seguradora)}}</option>
                                            @foreach($seguradora as $seguradora)
                                            <option value="{{ $seguradora->id}}">{{ $seguradora->nome_seguradora}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                    <label for="Contacto"><i class="fa fa-list-alt"></i> Plano</label>
                                    <input class="form-control" name="plano" placeholder="Plano de Saúde" type="text" value="{{$saude->plano}}">
                                </div>
                        </div><br>
                        
                        <div class="row">      
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-venus-mars"></i> Tipo de Membro</label>
                                    <select class="form-control" name="tipo_membro" id="tipo_membro" onchange="tipomembro(this.value)">
                                            <option value="{{$saude->tipo_membro}}" selected disabled> {{$saude->tipo_membro}}</option>
                                            <option value="Policy Holder" >Policy Holder</option>
                                            <option value="Spouse">Spouse</option>
                                            <option value="Child">Child</option>
                                        </select> 
                                </div>

                                <div class="col-xs-3">
                                    <label><i class="fa fa-key"></i> Número de Membro</label>
                                    <input class="form-control" name="numero_membro" placeholder="Numero de membro" type="text" value="{{$saude->numero_membro}}">
                                </div> 

                                <div class="col-xs-3">
                                 <label><i class="fa fa-money"></i> Prémio Total</label>
                                 <input class="form-control" name="premio_total" placeholder="Prémio Total" type="float" value="{{$saude->premio_total}}">    
                                </div>    

                                <div class="col-xs-3">
                                 <label><i class="fa fa-money"></i> Prémio Simples</label>
                                 <input class="form-control" name="premio_simples" placeholder="Prémio Simples" type="float" value="{{$saude->premio_simples}}">      
                                </div>
                        </div><br>

                    <div class="row">
                                
                                <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Inicio Cobertura</label>
                                    <input class="form-control" name="data_inicio" type="date" value="{{$saude->data_inicio}}">
                                </div>   

                                 <div class="col-xs-3">
                                    <label><i class="fa fa-calendar"></i> Data Fim Cobertura</label>
                                    <input class="form-control" name="data_proximo_pagamento"  type="date" value="{{$saude->data_proximo_pagamento}}">
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
                                    <input class="form-control" name="taxa_corretagem" placeholder="Taxa Corretagem " type="float" value="{{$saude->taxa_corretagem}}">
                                </div>
                    </div><br>
                    <div class="row">
                                 <div class="col-xs-3">
                                    <label><i class="fa fa-money"></i> Comissão Corretagem </label>
                                    <input class="form-control" name="comissao"  placeholder="Comissao Corretagem " type="float" value="{{$saude->comissao}}">
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
                                        </select>
                             </div><br>          

                    </div><br><br>     <hr />  

                     <div class="form-group">
                            <label for="DetalhesProspecao"><i class="fa fa-info"></i> Notas</label>
                            <textarea class="form-control" name="notas" rows="2" placeholder="Notas" >{{$saude->notas}}</textarea>
                        </div>
                
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