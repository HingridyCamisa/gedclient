@extends('adminlte::page')

@section('title', 'Editar Sinistro')

@section('content_header')

    <h1><a class="btn btn-primary"  href="{{ url('admin/sinistro/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>

@stop

@section('content')



          <!-- general form elements -->
    <div class="box box-solid box-success">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-subway"></i> Editar Sinistro</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="POST" action="{{ route('sinistros.update', $sinistros['id'])}}">
             @csrf
                <div class="box-body">

                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="Sinistro"><i class="fa fa-subway"></i> Sinistro </label>
                                    <input class="form-control" name="sinistro" placeholder="Sinistro" type="text" value="{{$sinistros->sinistro}}">
                                </div>
                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-user"></i> Segurado </label>
                                    <input class="form-control" name="nome_segurado" placeholder="Nome e Apelido" type="text" value="{{$sinistros->nome_segurado}}">
                                </div>

                                <div class="col-xs-3">
                                    <label for="NomeSeguradora"><i class="fa fa-institution"></i>Seguradora </label>
                                    <select class="form-control" name="seguradora">
                                    @foreach($seguradoras as $seguradora)
                                        <option value="{{$sinistros->seguradora}}" >{{ $seguradora->nome_seguradora}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-file-text"></i> Nº Apólice </label>
                                    <input class="form-control" name="numero_apolice" placeholder="Numero de Apólice " type="text" value="{{$sinistros->numero_apolice}}">
                                </div>

                            </div><br>


                            <div class="row">

                                <div class="col-xs-3">
                                    <label for="Sinistro"><i class="fa fa-calendar"></i> Data Sinistro </label>
                                    <input class="form-control" name="data_sinistro" placeholder="Sinistro" type="date" value="{{$sinistros->data_sinistro}}">
                                </div>
                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-calendar"></i> Data Participação Almond </label>
                                    <input class="form-control" name="data_participacao_almond" placeholder="" type="date" value="{{$sinistros->data_participacao_almond}}">
                                </div>

                                <div class="col-xs-3">
                                    <label for="NomeSeguradora"><i class="fa fa-calendar"></i> Data Participação Seguradora </label>
                                    <input class="form-control" name="data_participacao_seguradora" placeholder="" type="date" value="{{$sinistros->data_participacao_seguradora}}">
                                </div>

                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-calendar"></i> Data de Pagamento </label>
                                    <input class="form-control" name="data_pagamento" placeholder="Numero Dias " type="date" value="{{$sinistros->data_pagamento}}">
                                </div>

                            </div><br>

                            <div class="row">

                                <div class="col-xs-3">
                                    <label for="Sinistro"><i class="fa fa-money"></i> Valor Sinistro </label>
                                    <input class="form-control" id="valor_sinistro" name="valor_sinistro" placeholder="Valor Sinistro" type="text" value="{{$sinistros->valor_sinistro}}">
                                </div>
                                <div class="col-xs-3">
                                    <label for="NomeSegurado"><i class="fa fa-money"></i> Valor pago Seguradora </label>
                                    <input class="form-control" name="valor_pago_seguradora" placeholder="Valor pago Seguradora" type="text" value="{{$sinistros->valor_pago_seguradora}}">
                                </div>

                                <div class ="col-xs-2">
                                    <label for="generosegurado"><i class="fa fa-balance-scale"></i> Franquia</label>
                                        <div class="form-radio">
                                            <label class="radio-inline">
                                                <input type="radio"  value="1" name="radio" id="radio-sim">Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="0" name="radio" id="radio-nao">Nao
                                            </label>
                                        </div>
                                    </div>

                                <div class="col-xs-2">
                                    <label for="NomeSeguradora"><i class="fa fa-balance-scale"></i> Franquia </label>
                                    <input class="form-control" id="franquia" name="franquia" placeholder=" % Franquia" type="text" value="{{$sinistros->franquia}}">
                                </div>

                                <div class="col-xs-2">
                                    <label for="NomeSegurado"><i class="fa fa-money"></i> Valor Franquia </label>
                                    <input class="form-control" name="valor_franquia" placeholder="Valor Franquia " id="valor_franquia" type="text" value="{{$sinistros->valor_franquia}}">
                                </div>

                            </div><br>

                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="consultor"><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" name="consultor">
                                            @foreach($consultor as $consultor)
                                            <option value="{{$sinistros->consultor}}">{{ $consultor->nome_consultor}}</option>
                                            @endforeach
                                        </select>
                                </div>

                                <div class="col-xs-3">
                                    <label for="numero_dias"><i class="fa fa-calendar"></i> Nº de Dias </label>
                                    <input class="form-control" name="numero_dias" placeholder="Numero de Dias" type="text" value="{{$sinistros->numero_dias}}">
                                </div>

                                <div class="col-xs-3">
                                    <label for="numero_dias"><i class="fa fa-calendar"></i> Situação </label>
                                    <select  class="form-control" name="situacao">
                                        <option value="{{$sinistros->situacao}}">Iniciado</option>
                                        <option value="{{$sinistros->situacao}}">Em andamento</option>
                                        <option value="{{$sinistros->situacao}}">Finalizado</option>
                                        <option value="{{$sinistros->situacao}}">Repudiado</option>
                                    </select>
                                </div>

                                <div class="col-xs-3">
                                    <label for="upload apolice"><i class="fa fa-upload"></i> Upload Documentos </label>
                                    <input  type="file">
                                </div>
                            </div><br>

                            <label for="numero_dias"><i class="fa fa-info"></i> Detalhes Sinistro </label>
                             <textarea class="form-control" name="detalhes" placeholder="Detalhes do Sinistro" row="3">{{$sinistros->detalhes}}</textarea>


              </div>
              <!-- /.box-body -->

                  <div class="box-footer"><center><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submeter</button></center></div>

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


<script>
$(document).ready(function() {
  $('input[name="radio"]').on('click change', function(e) {
      var data=($(this).val());
      var valor_sinistro=$('#valor_sinistro').val();
      var franquia=$('#franquia').val();
      var valorfranquia=0;
        if (franquia<=0) {


          document.getElementById("radio-sim").checked = false;
          document.getElementById("radio-nao").checked = true;
          alert("introduza o valor da franquia");
        }else if (data==1) {
          valorfranquia=valor_sinistro*(franquia/100);
          $('#valor_franquia').val(valorfranquia);

          document.getElementById("valor_franquia").disabled = false;
        }else if (data==0) {
          $('#franquia').val("");
          $('#valor_franquia').val(0);
          document.getElementById("valor_franquia").disabled = true;

        }

      console.log(data);
  });
});
</script>


@stop
