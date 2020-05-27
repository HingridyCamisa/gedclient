@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Recibos </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> Código Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-key"></i>  Código Recibo</center></th>
          <th scope="col"><center> Cobrança</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor Aviso</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor Recibo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Aviso</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Recibo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Pagamento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Metodo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Comprovativo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Seguradora</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($avisos as $i => $aviso)
        <tr>
        <td><center>
              @if($aviso->tipo=='contratos')
              <a href="{{url('admin/contrato/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
              @else
               <a href="{{url('admin/saude/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
             @endif
          </center></td>
          <td><center><a href="{{ route ('clientes.show',$aviso->cliente)}}">{{ $aviso->cliente_nome }}</a></center></td>
          <td><center>{{str_pad( $aviso->nu_recibo, 6, "0", STR_PAD_LEFT)}}</center></td>

          <td><center>
                 @if($aviso->tipo=='saudes')
                   Saúde
                 @else
                    Contrato
                 @endif
          </center></td>
          <td><center>
              @if($aviso->status_recibos==0)
              <i class="fa fa-close text-red"></i> Eliminado
              @elseif($aviso->status_recibos==1)
              <i class="fa fa-check text-green"></i> Pago
              @endif

              </center></td>
          <td><center> {{number_format($aviso->aviso_amount , 2, ',', ' ') }}</center></td>
          <td><center> {{number_format($aviso->amount, 2, ',', ' ') }}</center></td>
          <td><center>{{ $aviso->updated_at }}</center></td>
          <td><center>{{ $aviso->data_atualizacao }}</center></td>
          <td><center>{{ $aviso->data_pagamento}}</center></td>
          <td><center>{{ $aviso->forma_pagamento}}</center></td>
          <td><center>{{ $aviso->comprovativo}}</center></td>
          <td><center> <a href="{{url('admin/financas/recibos/recibo',$aviso->token_id)}}" class="btn btn-success margin btn-xs">Recibo</a></center></td>

           <td><center>
              @if($aviso->status_recibos==1)
              @can('financas_recibo_destroy')
              {!! Form::open(['method' => 'DELETE','url' => ['admin/financas/recibos/destroy', $aviso->nu_recibo],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger margin btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endcan
              @else
              @can('financas_recibo_destroy')
              {!! Form::open(['method' => 'DELETE','url' => ['admin/financas/recibos/destroy/db', $aviso->nu_recibo],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger margin btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endcan
              @endif
            </center>
           </td>
           <td>
               
              <a href="{{url('admin/financas/seguradora',[$aviso->token_id,$aviso->cliente_nome,$aviso->nu_recibo])}}" class="btn bg-purple margin btn-xs">Seguradora</a>
           </td>


      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> Código Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-key"></i>  Código Recibo</center></th>
          <th scope="col"><center> Cobrança</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor Aviso</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor Recibo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Aviso</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Recibo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data Pagamento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Metodo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Comprovativo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Seguradora</center></th>
          </tr>
      </tfoot>
    </table>
   </div>


<script>
    if ($("#pagamentos").length > 0) {

        
       $("#pagamentos").validate({
      
      
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
      $('#save').html('Sending..');
      $.ajax({
        url: '{{url('admin/savepaymat')}}',
        type: "POST",
        data: $('#pagamentos').serialize(),
          success: function (response) {
              if (response.msg) {
                  $('#res_message').html(response.msg);//toast msg
                  $('#img').html('<i class="fa fa-floppy-o" aria-hidden="true"></i>');//toast icon
                  launch_toast();//toast show
              } else {
                  response.errors.forEach(myFunction);

                  function myFunction(item, index) {
                        $('#res_message').html(item);//toast msg
                        $('#img').html('<i class="fa fa-close text-red" ></i>');//toast icon

                        launch_toast();//toast show
                    }

                   
              }

           

            $('#message').val('');

            $('#save').html('Submeter');



 

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


<script>
  $(document).on('click', 'button[id="pagamento"]', function(){
      $valu = $(this).val();
      $('#aviso_id').val($valu);
  } );

 
</script>


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 0, "asc" ]],
        "columnDefs": [
                        { "type": "date-eu", "targets": 6 }
                      ],
        buttons: [
            {
              extend: 'copy',
              text: '<i class="fa fa-files-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'excel',
              text: '<i class="fa fa-file-excel-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'csv',
              text: '<i class="fa fa-file-text-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'pdf',
              text: '<i class="fa fa-file-pdf-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'print',
              text: '<i class="fa fa-fw fa-print"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'colvis',
              text: '<i class="fa fa-fw fa-eye-slash"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
        ]
    } );
} );

</script>


 {{ $avisos->links() }}

@stop
