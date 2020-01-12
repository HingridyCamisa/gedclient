@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/prospecoes/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
@stop

@section('content')
          <!-- general form elements -->
  <div class="box box-solid box-danger">
         <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes Prospecção do Cliente </strong> <i> {{$prospecao->nome_cliente}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $prospecao->id}}</td> 
        </tr>
        <tr>
          <th>Nome Cliente</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$prospecao->nome_cliente }}</td>
        </tr>
        <tr>
          <th>Nome Consultor</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$prospecao->nome_consultor }}</td>
        </tr>
        <tr>
          <th>Tipo Cliente</th>
          <td><i class="fa fa-fw fa-user"></i> &nbsp; {{$prospecao->tipo_cliente }}</td>
        </tr>
        <tr>
        <tr>
          <th>Endereço Cliente</th>
          <td><i class="fa fa-fw fa-map-pin"></i> &nbsp; {{$prospecao->endereco_cliente }}</td>
        </tr>
        <tr>
          <th>Contacto Cliente</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$prospecao->contacto_cliente }}</td>
        </tr>
        <tr>
          <th>Email Cliente</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$prospecao->email_cliente }}</td>
        </tr>
        <tr>
          <th>Data Início</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_inicio)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Prevista Fim</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($prospecao->data_prevista_fim)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Ramo</th>
          <td>&nbsp;{{$prospecao->tipo_prospecao }}</td>
        </tr>
        <tr>
          <th>Origem Prospecção</th>
          <td><i class="fa fa-map-pin"></i> &nbsp; {{$prospecao->origem_prospecao }}</td>
        </tr>
        <tr>
          <th>Estado Prospecção</th>
          <td><i class="fa fa-briefcase"></i> &nbsp; {{$prospecao->estado }}</td>
        </tr>
        <tr>
          <th>Valor Estipulado Carteira</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($prospecao->valor_estipulado_carteira, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Detalhes Prospecção</th>
          <td><i class="fa fa-info"></i> &nbsp; {{$prospecao->detalhes_prospecao }}</td>
        </tr>
        <tr>
          <th>Estado Prospecção</th>
              @if(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->isPast())         
                <td><i class="fa fa-close text-red"></i> Expirada</td>
              @else
                <td><i class="fa fa-check text-green"></i> Em dia</td>
              @endif
        </tr>

      </tbody>
    </table>


  </div>


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
        <input type="hidden" name="task_id" id="task_id" value="{{$prospecao->id}}" />
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" /> 
        <input type="hidden" name="token_id" id="token_id" value="prospecoes" /> 


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
        data: {'task_id': $('#task_id').val() , 'token_id':'prospecoes'},
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






