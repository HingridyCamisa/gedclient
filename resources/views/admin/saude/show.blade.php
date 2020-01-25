@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  


  <a class="btn btn-social-icon btn-github"  href="{{ url('admin/saude/index')}}"><i class="fa  fa-arrow-left"></i></a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a>
  <a href="{{url('admin/aviso-de-cobranca/saudes',[$saude->id,$saude->token_id])}}" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Aviso Cobrança
  </a>
    
@stop

@section('content')

<page id="printableArea" name="printableArea"> 
          <!-- general form elements -->
          <div class="box box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-medkit"></i> Detalhes Seguro de Saúde do Cliente </strong> <i> {{$saude->nome_segurado}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $saude->token_id}}</td> 
        </tr>
        <tr>
          <th>Nome Cliente</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->cliente->cliente_nome}}</td>
        </tr>
        <tr>
          <th>Data Nascimento</th>
          <td><i class="fa fa-birthday-cake"></i> &nbsp; {{ $data=Carbon\Carbon::parse($saude->cliente->cliente_data_nascimento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Idade</th>
          <td><i class="fa fa-male"></i> &nbsp; {{Carbon\Carbon::parse($saude->cliente->cliente_data_nascimento)->age}}</td>
        </tr>
        <tr>
          <th>Ano de Nascimento</th>
          <td><i class="fa fa-birthday-cake"></i> &nbsp; {{ Carbon\Carbon::parse($saude->cliente->cliente_data_nascimento)->format('Y')  }}</td>
        </tr>
        <tr>
          <th>Telefone 1</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$saude->cliente->cliente_telefone_1}}</td>
        </tr>
        <tr>
          <th>Telefone 2</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$saude->cliente->cliente_telefone_1}}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$saude->cliente->cliente_email }}</td>
        </tr>
        <tr>
          <th>Tipo Segurado</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->tipo_segurado }}</td>
        </tr>
        <tr>
          <th>Pessoa Contacto</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saude->pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Email Pessoa Contacto</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$saude->email_pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Contacto Pessoa Contacto</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$saude->contacto_pessoa_contacto }}</td>
        </tr>
        <tr>
          <th>Seguradora</th>
          <td><i class="fa fa-institution"></i> &nbsp; {{$saude->seguradora->nome_seguradora }}</td>
        </tr>
        <tr>
          <th>Plano</th>
          <td><i class="fa fa-list-alt"></i> &nbsp; {{$saude->plano }}</td>
        </tr>
        <tr>
          <th>Nome Grupo</th>
          <td><i class="fa fa-users"></i> &nbsp; {{$saude->nome_grupo }}</td>
        </tr>
        <tr>
          <th>Tipo Membro</th>
          <td><i class="fa fa-venus-mars"></i> &nbsp; {{$saude->tipo_membro }}</td>
        </tr>
        <tr>
          <th>Número de Membro</th>
          <td><i class="fa fa-key"></i> &nbsp; {{$saude->numero_membro }}</td>
        </tr>
        <tr>
          <th>Data Inicio Cobertura</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($saude->data_inicio_cobertura)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Fim Cobertura</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($saude->data_fim_cobertura)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Periodicidade de Pagamento</th>
          <td><i class="fa fa-hourglass-2"></i> &nbsp; {{$saude->periodicidade_pagamento }}</td>
        </tr>
        <tr>
          <th>Prémio Mensal</th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->premio_total }}</td>
        </tr>
        <tr>
          <th>Taxa Corretagem </th>
          <td><i class="fa fa-calculator"></i> &nbsp; {{$saude->taxa_corretagem }}</td>
        </tr>
        <tr>
          <th>Comissão Corretagem </th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->comissao }}</td>
        </tr>
        <tr>
          <th>Situação </th>
          <td><i class="fa fa-money"></i> &nbsp; {{$saude->situacao}}</td>
        </tr>
        <tr>
          <th>Estado do Seguro de Saúde</th>
          @if(\Carbon\Carbon::parse($saude->data_fim_cobertura)->isPast())         
          <td><i class="fa fa-close text-red"></i> Expirada</td>
          @else
           <td><i class="fa fa-check text-green"></i> Em dia</td>
           @endif

        </tr>
      </tbody>
    </table>
</page>       



<div class="box box-solid box-danger">

            <div class="box-header with-border">
                <h3 class="box-title"><strong><i class="fa fa-commenting"></i> Comentários</strong></h3>
            </div>

              <!-- form start -->
              <div class="" >
                  <div class="direct-chat-messages" id="messages">
                  <!-- Message. Default to the left -->
                  <!-- /.direct-chat-msg -->
                  </div>

              </div>

            <form id="form_coment" method="post" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0)">
            @csrf
            <div class="box-body">
            <div class="input-group">
                <input type="hidden" name="task_id" id="task_id" value="{{$saude->id}}" />
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" /> 
                <input type="hidden" name="token_id" id="token_id" value="saudes" /> 


            </div>

            <input type="text" name="message" id="message" placeholder="Escreva uma messagem ..." class="form-control"/>
            </div>
                <div class="box-footer">
                    <span class="input-group-btn" >
                
                        <button type="submit" class="btn btn-danger" id="save_coment"><i class="fa fa-save" aria-hidden="true"></i> Submeter</button>
                    </span>
                </div>

            </form>
              
    </div>
                  
        <div id="toast"><div id="img"></div><div id="desc"><span id="res_message"></span></div></div>


        <script>//find all comments from the task

        $(document).ready(function () { coments() });

        function coments() {
            $('#messages').empty();

          $.ajax({
            url: '{{url('admin/allcomments')}}',
            type: "get",
            data: {'task_id': $('#task_id').val() , 'token_id':'saudes'},
              success: function (data) {

                  $('#messages').html(data);

            }
          });
        }


        </script>

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
       launch_toast();//toast show
       

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