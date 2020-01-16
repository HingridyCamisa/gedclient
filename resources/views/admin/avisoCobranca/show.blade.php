@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')

  <h1><a class="btn btn-social-icon btn-github"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i></a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a></h1>
@stop

@section('content')

<page id="printableArea" name="printableArea">   
          <!-- general form elements -->
  <div class="box box-solid box-danger">
         <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Aviso de Cobrança: </strong> <i> {{$cliente->cliente_nome}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th width="15%">Codigo do Contrato</th>
          <td width="30%"><i class="fa fa-key"></i> &nbsp; {{ $contrato->token_id}}</td> 
        </tr>
        <tr>
          <th>Valor Total do Premio</th>
          <td><i class="fa fa-money"></i> &nbsp; {{number_format($contrato->premio_total, 2, ',', ' ') }}</td> 
        </tr>
         <tr>
          <th>Data inicio do contrato</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $data=\Carbon\Carbon::parse($contrato->data_inicio)}}</td> 
        </tr>
         <tr>
          <th>Data fim do contrato</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ \Carbon\Carbon::parse($contrato->data_proximo_pagamento)}}</td> 
        </tr>
         <tr>
          <th>Dias Cobertos</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ $dias_cobertos}}</td> 
        </tr>
         <tr>
          <th>Tipo de renovação</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{$contrato->periodicidade_pagamento }}</td> 
        </tr>
         <tr>
          <th>
          </th>
          <th>
          </th>
         </tr>
        @for ($i = 1; $i <= $denominador; $i++) 
         <tr>
          <th> {{$i}}º </th>
          <th><i class="fa fa-calendar"></i> @if($contrato->periodicidade_pagamento!='Mensal'){{$data->addDays($dia_periodo)->format('d-m-Y') }}@else{{$data->addMonthNoOverflow()->format('d-m-Y') }}@endif</th>
          <td width="17%"> <i class="fa fa-money"></i> &nbsp; {{number_format(round($valor_a_pagar,2), 2, ',', ' ')}}</td> 
             <td><center>
                 <a href="{{url('admin/gerar-aviso-de-cobranca',[$contrato->token_id,$cliente->token_id,$i,$valor_a_pagar,$data])}}" class="btn btn-danger btn-xs "><i class="fa fa-list"></i> Aviso de Cobrança</a>
                 <a href="" class="btn bg-orange  btn-xs"><i class="fa fa-file-pdf-o"></i> PDF</a>
             </center></td>
         </tr>
         @endfor

      </tbody>
    </table>


  </div>
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
        <input type="hidden" name="token_id" id="token_id" value="aviso_cobranca" /> 


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
        data: {'task_id': $('#task_id').val() , 'token_id':'aviso_cobranca'},
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






