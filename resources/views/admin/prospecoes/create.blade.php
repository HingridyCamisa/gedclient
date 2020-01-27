@extends('adminlte::page')

@section('title', 'Adicionar Prospecção')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
   
@stop

@section('content')
@include('notification')

          <!-- general form elements -->
          <div class="box box-solid box-danger">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Adicionar Prospecção: {{$cliente->cliente_nome}}</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ route('prospecoes.store') }}">
                            @csrf
                        <div class="box-body">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                            <input type="hidden" name="client_id" value="{{$cliente->id}}" />
                            <input type="hidden" name="client_token" value="{{$cliente->token_id}}" />
                            <div class="row">
                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" name="nome_consultor" >
                                            <option  value="{{old('nome_consultor')}}" selected disabled> Select ..</option>
                                             @foreach($consultors as $consultor)
                                            <option value="{{$consultor->id}}">{{ $consultor->nome_consultor}}</option>
                                            @endforeach

                                        </select>
                                </div>
                                <div class="col-xs-3">
                                    <label> Ramo </label>
                                        <select class="form-control" name="tipo_ramo">
                                            <option  value="{{old('tipo_ramo')}}" selected disabled> {{old('tipo_ramo','Select')}}</option>
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
                                        <label><i class="fa fa-map-pin"></i> Origem Prospecção </label>
                                        <select class="form-control" name="origem_prospecao">
                                            <option  value="{{old('origem_prospecao')}}" selected disabled> {{old('origem_prospecao','Select')}}</option>
                                            <option value="Indefinido">Indefinido</option>
                                            <option value="Corretora">Corretora</option>
                                            <option value="Indicado">Indicado</option>
                                            <option value="Site">Site</option>
                                            <option value="Jornal">Jornal</option>
                                            <option value="Outros">Outros</option>
                                        </select>
                                    </div>
                                <div class="col-xs-3">
                                <label><i class="fa fa-briefcase"></i> Estado Prospecção </label>
                                <select class="form-control" name="estado">
                                    <option  value="{{old('estado')}}" selected disabled> {{old('estado','Select')}}</option>
                                    <option value="Espera da Cotação  (Seguradora)">Espera da Cotação  (Seguradora)</option>
                                    <option value="Preenchimento de formulário">Preenchimento de formulário</option>
                                    <option value="Em Espera (Negociação com o cliente)">Em Espera (Negociação com o cliente)</option>
                                    <option value="Cotação  enviada para o cliente">Cotação  enviada para o cliente</option>
                                    <option value="Perdida">Perdida</option>
                                    <option value="Assinado(Tornar Contrato)">Assinado(Tornar Contrato)</option>
                                            
                                </select>
                                </div>



                                </div>
                                
                                 <br>
                                
                                
                                <div class="row">
                                    <div class="col-xs-3">
                                    <label for="DataInicio"><i class="fa fa-calendar"></i> Data Início </label>
                                        <input class="form-control " name="data_inicio"  type="date" value="{{old('data_inicio')}}">
                                    
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="DataPrevistaFim"><i class="fa fa-calendar"></i> Data Prevista Fim </label>
                                        <input class="form-control" name="data_prevista_fim"  type="date"value="{{old('data_prevista_fim')}}">
                                    </div>
                                  

                                   
                                        
                                <div class="col-xs-3">
                                    <label><i class="fa fa-money"></i> Valor Estipulado da Carteira </label>
                                    <input class="form-control" name="valor_estipulado_carteira" placeholder="Valor estipulado " type="number" pattern="([0-9]{1,3}).([0-9]{1,3})" value="{{old('valor_estipulado_carteira')}}">
                                </div>
                                </div> <br>
                                


                              
                                
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Prospecção</label>
                                    <textarea class="form-control" name="detalhes_prospecao" rows="3" placeholder="Detalhes ..." >{{old('detalhes_prospecao')}}</textarea>
                                
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


<script>

    function tipocliente(val) {
        if (val=='Individual') {
            $("#pessoa_contacto").prop('disabled', true);
        } else {
            $("#pessoa_contacto").removeAttr('disabled');
        }
        
    }
</script>


@stop