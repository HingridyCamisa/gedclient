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
                                            <option value="{{$prospecao->tipo_cliente}}" selected>{{$prospecao->tipo_cliente}}</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Empresa">Empresa</option>
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
                                            <option value="{{$prospecao->tipo_prospecao}}" selected >{{$prospecao->tipo_prospecao}}</option>
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
                                        <select class="form-control" name="origem_prospecao" >
                                            <option value="{{$prospecao->origem_prospecao}}" selected >{{$prospecao->origem_prospecao}}</option>
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
                                        <select class="form-control" name="estado" >
                                            <option value="{{$prospecao->estado}}" selected >{{$prospecao->estado}}</option>
                                            <option value="Espera da Cotação  (Seguradora)">Espera da Cotação  (Seguradora)</option>
                                            <option value="Preenchimento formulário<">Preenchimento formulário</option>
                                            <option value="Em Espera (Negociação com o cliente)">Em Espera (Negociação com o cliente)</option>
                                            <option value="Cotação enviada para o cliente">Cotação enviada para o cliente</option>
                                            <option value="Perdida">Perdida</option>
                                            <option value="Assinado(Tornar Contrato)">Assinado(Tornar Contrato)</option>
                                            
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









<script>

    if ($("#form_coment").length > 0) {



        

       $("#form_coment").validate({

      

      

            rules: {

                "message": {

                    required: true,

                    maxlength: 255,

                },    

            },

            messages: {

        

                  "message": {

                    required: "Please type your message",

                  },

         

            },

    submitHandler: function(form) {

     $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });

      $('#save_coment').html('Sending..');

      $.ajax({

        url: '{{url('admin/comentsave')}}',

        type: "POST",

        data: $('#form_coment').serialize(),

        success: function( response ) {

            

            $('#res_message').html(response.msg);//toast msg

            $('#img').html('<i class="fa fa-floppy-o" aria-hidden="true"></i>');//toast icon



            coments();//all coments

           // launch_toast();//toast show

           



            $('#message').val('');



            $('#save_coment').html('Submit');

 



        }

      });

    }

  })

}



function launch_toast() {//toast function

    var x = document.getElementById("toast")

    x.className = "show";

    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

    }





</script>
   

@stop