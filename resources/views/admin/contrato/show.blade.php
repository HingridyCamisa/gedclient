@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
<<<<<<< HEAD
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i></a>
  <a class="btn btn-danger pull-right"  href="{{ url('admin/contrato/aviso')}}"><i class="fa fa-fw fa-download"></i> Aviso Cobrança</a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a>
=======
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/contrato/index')}}"><i class="fa  fa-arrow-left"></i></a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a>
  <a href="{{url('admin/aviso-de-cobranca/contratos',$contrato->id)}}" class="btn btn-danger pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Aviso Cobrança
  </a>
>>>>>>> dc53e883d23e6dd4a5275e246f98017af95950c7
  </h1>
    
@stop

@section('content')
@include('notification')

<page id="printableArea" name="printableArea">  

    <div class="box box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes Contrato do Segurado </strong> <i> {{$contrato->cliente->cliente_nome}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>Scret key</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $contrato->token_id}}</td> 
        </tr>
        <tr>
          <th>Nome Consultor</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$contrato->consultorx->nome_consultor }}</td>
        </tr>
        <tr>
          <th>Nome Seguradora</th>
          <td><i class="fa fa-institution"></i> &nbsp; {{$contrato->seguradora->nome_seguradora }}</td>
        </tr>
        <tr>
        <tr>
          <th>Nome Segurado</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$contrato->cliente->cliente_nome }}</td>
        </tr>
        <tr>
          <th>Nº Apólice</th>
          <td><i class="fa  fa-user"></i> &nbsp; {{$contrato->numero_apolice }}</td>
        </tr>
        <tr>
        <tr>
          <th>Nº Recibo</th>
          <td><i class="fa  fa-user"></i> &nbsp; {{$contrato->numero_recibo }}</td>
        </tr>
        <tr>
        <tr>
          <th>Ramo</th>
          <td><i class="fa  fa-map-pin"></i> &nbsp; {{$contrato->tipo_ramo }}</td>
        </tr>
        <tr>
          <th>Periodicidade Pagamento</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$contrato->periodicidade_pagamento }}</td>
        </tr>
        <tr>
          <th>Data Início</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($contrato->data_inicio)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Data Próximo  Pagamento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($contrato->data_proximo_pagamento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Dias Cobertos</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $contrato->dias_cobertos }}</td>
        </tr>
        <tr>
          <th>Data Próximo  Pagamento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $contrato->dias_proximo_pagamento }}</td>
        </tr>
        <tr>
          <th>Capital Seguro</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->capital_seguro, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Prémio Total</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->premio_total, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Prémio Simples</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->premio_simples, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Comissão Corretagem</th>
          <td><i class="fa fa-money"></i> &nbsp; {{  'MTN '.number_format($contrato->comissao, 2, ',', '.') }}  </td>
        </tr>
        <tr>
          <th>Taxa Corretagem</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->taxa_corretagem}}  </td>
        </tr>
        <tr>
          <th>Item Segurado</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->item_segurado}}  </td>
        </tr>
        <tr>
          <th>Situação</th>
          <td><i class="fa fa-money"></i> &nbsp; {{ $contrato->situacao}}  </td>
        </tr>

        <tr>
          <th>Detalhes Item Segurado</th>
          <td><i class="fa fa-info"></i> &nbsp; {{$contrato->detalhes_item_segurado}}</td>
        </tr>
        <tr>
          <th>Estado Contrato</th>
          @if(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->isPast())         
          <td><i class="fa fa-close text-red"></i> Expirado</td>
          @else
           <td><i class="fa fa-check text-green"></i> Em dia</td>
           @endif

        </tr>
      </tbody>
    </table>  
   </div>     
    <!-- /.box-header -->
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
                <input type="hidden" name="task_id" id="task_id" value="{{$contrato->id}}" />
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" /> 
                <input type="hidden" name="token_id" id="token_id" value="contratos" /> 


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
            data: {'task_id': $('#task_id').val() , 'token_id':'contratos'},
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

