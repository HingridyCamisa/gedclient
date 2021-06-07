@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')

  <h1><a class="btn btn-social-icon btn-github"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i></a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a></h1>
@stop

@section('content')
@include('notification')

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
    </tbody>
    </table>
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        @php
        $startDate=\Carbon\Carbon::parse($contrato->data_inicio)
        @endphp
        @php
          $inicialData = \Carbon\Carbon::parse($contrato->data_inicio)
        @endphp
        @for ($i = 1; $i <= $denominador; $i++)  
         <tr>
          <th width="3%"> {{$i}}º </th>
          <th width="7%"><i class="fa fa-calendar"></i>
            @php
            $finalData = new \Carbon\Carbon($inicialData)
            @endphp

            {{$inicialData->format('d-m-Y') }}
            -
            {{$finalData->addDays(30)->format('d-m-Y') }}
             
         </th>
          <td width="10%"> <i class="fa fa-money"></i> &nbsp; {{number_format(round($valor_a_pagar,2), 2, ',', ' ')}}</td> 
          <th  width="13%"><i class="fa fa-calendar"></i>
                 @if($finalData->isPast())
                    <i class="fa fa-close text-red"></i> Expirado   {{$finalData->diffForHumans() }}
                 @else
                    <i class="fa fa-check text-green"></i> Em dia     {{$finalData->diffForHumans() }}
                 @endif

         </th>
          <td width="13%"><center>
            @php
            $verification = false 
            @endphp
                 @foreach($avisosDB as $avisosDBX)
                    @if($avisosDBX['token_id']==$contrato->token_id.$i)
                        @if($avisosDBX['status']==2)
                        <a href="{{url('admin/avisode-cobranca-view',[$avisosDBX['tipo'],$avisosDBX['contrato_token_id'],$avisosDBX['token_id']])}}" class="btn bg-lime   btn-xs"><i class="fa fa-file-pdf-o"></i> Pago</a>
                        @elseif($avisosDBX['status']==3)
                        <a href="{{url('admin/avisode-cobranca-view',[$avisosDBX['tipo'],$avisosDBX['contrato_token_id'],$avisosDBX['token_id']])}}" class="btn bg-teal   btn-xs"><i class="fa fa-file-pdf-o"></i> Aviso Pendente</a>
                        @else
                        <a href="{{url('admin/avisode-cobranca-view',[$avisosDBX['tipo'],$avisosDBX['contrato_token_id'],$avisosDBX['token_id']])}}" class="btn bg-purple   btn-xs"><i class="fa fa-file-pdf-o"></i> PDF do Aviso</a>
                        @endif
                         @php
                            $verification = true 
                         @endphp
                         @break
                    @else
                        @php
                            $verification = false 
                        @endphp
                 @endif
                 @endforeach

                 @if($verification == false)
                        <a href="{{url('admin/gerar-aviso-de-cobranca',[$tipo,$contrato->token_id,$cliente->token_id,$i,$valor_a_pagar,$inicialData,\Carbon\Carbon::parse($finalData),$denominador])}}" class="btn bg-olive btn-xs "><i class="fa fa-list"></i> {{$finalData->format('d-m-Y') }} -{{$dia_periodo}} Aviso de Cobrança</a>
                 @endif
            
                 
             </center>
          </td>
         </tr>
         <!--$inicialData = $inicialData->addDays($dia_periodo)-->
          @php   
            $inicialData = $inicialData->addMonthNoOverflow($dia_periodo)
          @endphp
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






