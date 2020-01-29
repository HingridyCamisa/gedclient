@extends('adminlte::page')

@section('title', 'Editar Prospecção')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
   
@stop

@section('content')
@include('notification')

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
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                
                            <div class="row">
                                <div class="col-xs-3">
                                    <label><i class="fa fa-user"></i> Consultor</label>
                                        <select class="form-control" name="nome_consultor" >
                                            <option  value="" selected disabled>Select</option>
                                             @foreach($consultors as $consultor)
                                            <option value="{{$consultor->id}}">{{ $consultor->nome_consultor}}</option>
                                            @endforeach

                                        </select>
                                </div>
                                <div class="col-xs-3">
                                    <label> Ramo </label>
                                    <select class="form-control" name="ramo">
                                  
                                                @foreach($ramos as $ramo)
                                                <option value="{{ $ramo->id}}"> {{ $ramo->ramo}}</option>
                                                @endforeach
                                            </select>
                                            </div>

                                            
                                      

                                    <div class="col-xs-3">
                                        <label><i class="fa fa-map-pin"></i> Origem Prospecção </label>
                                        <select class="form-control" name="origem_prospecao">
                                            <option  value="{{old('origem_prospecao',$prospecao->origem_prospecao)}}" selected disabled> {{old('origem_prospecao',$prospecao->origem_prospecao)}}</option>
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
                                    <option  value="{{old('estado',$prospecao->estado)}}" selected disabled> {{old('estado',$prospecao->estado)}}</option>
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
                                        <input class="form-control " name="data_inicio"  type="date" value="{{old('data_inicio',$prospecao->data_inicio)}}">
                                    
                                    </div>
                                    <div class="col-xs-3">
                                    <label for="DataPrevistaFim"><i class="fa fa-calendar"></i> Data Prevista Fim </label>
                                        <input class="form-control" name="data_prevista_fim"  type="date" value="{{old('data_prevista_fim',$prospecao->data_prevista_fim)}}" >
                                    </div>
                                    
                                        
                                <div class="col-xs-3">
                                    <label><i class="fa fa-money"></i> Valor Estipulado da Carteira </label>
                                    <input class="form-control" name="valor_estipulado_carteira" placeholder="Valor estipulado " type="number" pattern="([0-9]{1,3}).([0-9]{1,3})" {{old('valor_estipulado_carteira',$prospecao->valor_estipulado_carteira)}}>
                                </div>
                                </div> <br>
                               
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Detalhes Prospecção</label>
                                    <textarea class="form-control" name="detalhes_prospecao" rows="3" placeholder="Detalhes ..." value="{{$prospecao->detalhes_prospecao}}"></textarea>
                                
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