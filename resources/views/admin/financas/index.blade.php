@extends('adminlte::page')

@section('title','Avisos')

@section('content_header')
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Avisos </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> Código </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data Fim </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i>  Estado </center> </th>
          <th scope="col"><center> Cobrança</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Situação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Aviso MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Recibo MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Saldo MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de Atualização</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de Criação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Pagamento</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($avisos as $i => $aviso)
        <tr>
        <td><center>
              <a href="{{url('admin/financas/avisoViaTableAvisos',$aviso->id)}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
          </center></td>
          <td><center><a href="{{ route ('clientes.show',$aviso->cliente)}}">{{ $aviso->cliente_nome }}</a></center></td>
          <td><center>{{ $aviso->cliente_email }}</center></td>
          <td><center>{{ $aviso->aviso_data}}</center></td>
          <td><center>
                 @if(($data=\Carbon\Carbon::parse($aviso->aviso_data))->isPast())
                    <i class="fa fa-close text-red"></i> Expirado  {{$data->diffForHumans()}}
                 @else
                    <i class="fa fa-check text-green"></i> Em dia  {{$data->diffForHumans()}}
                 @endif
           </center></td>
          <td><center>
                 @if($aviso->tipo=='saudes')
                   Saúde
                 @else
                    Contrato
                 @endif
          </center></td>
          <td><center>
              @if($aviso->status==1)
              <i class="fa fa-close text-red"></i> Não Pago
              @elseif($aviso->status==2)
              <i class="fa fa-check text-green"></i> Pago
              @elseif($aviso->status==0)
              <i class="fa fa-trash"></i> Eliminado
              @endif

              </center></td>
          <td><center> {{number_format($aviso->aviso_amount , 2, ',', ' ') }}</center></td>
          <td><center> {{number_format($aviso->recibo_amount , 2, ',', ' ') }}</center></td>
          <td><center> {{number_format($aviso->aviso_amount-$aviso->recibo_amount , 2, ',', ' ') }}</center></td>
          <td><center>{{ $aviso->updated_at }}</center></td>
          <td><center>{{ $aviso->created_at }}</center></td>

           <td><center>
               <button type="button" id="pagamento"  value ="{{$aviso->id}}" class="btn btn-success btn-xs" data_value="{{ $aviso->name }}" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-fw fa-money"></i>
              </button>
            </center>
             </td>


      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> Código </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data Fim </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i>  Estado </center> </th>
          <th scope="col"><center> Cobrança</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Situação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Aviso MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Recibo MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Saldo MTN</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de Atualização</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de Criação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Pagamento</center></th>
          </tr>
      </tfoot>
    </table>
   </div>


   <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header  btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
               <center> <h4 class="modal-title"><i class="glyphicon glyphicon-credit-card"></i> &nbsp; Pagamento <span class="aviso_id"></span></h4> </center>
              </div>
              <form id="pagamentos" method="post" enctype="multipart/form-data" action="javascript:void(0)" >
              <div class="modal-body row">
              

                
                    @csrf
                   <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                   <input type="hidden" name="aviso_id" id="aviso_id"  />
                
                     <p> <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                          <input class="form-control"  placeholder="Nº de Comprovativo de Pagamento" type="text" name="comprovativo" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>
    
                     <p> 

                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span>
                            <select class="form-control" id="forma_pagamento" name="forma_pagamento" required autofocus  onchange="formaPagamento(this.value)">
                                <option value="" disabled selected>Seleciona a forma de pagamento</option>
                                <option value="Deposito">Deposito</option>
                                <option value="Cash">Cash</option>
                                <option value="TRF">TFR</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>

                    
                        </div>
                        </div>

                    </p> <br><br>    
                     <p> 

                        <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-caret-square-o-down"></i></span>
                            <select class="form-control"  name="operacao" required autofocus  >
                                <option value="" disabled selected>Seleciona o tipo de operação</option>
                                <option value="Nova Apolice">Nova Apolice</option>
                                <option value="Seguro Novo">Seguro Novo</option>
                                <option value="Renovacao">Renovacao</option>
                                <option value="Segunda  prestacao">Segunda  prestacao</option>
                                <option value="Aviso Previo">Aviso Previo</option>
                                <option value="Seguro Unico">Seguro Unico</option>
                                <option value="Inclusao">Inclusao</option>
                                <option value="Segundo aviso">Segundo aviso</option>
                            </select>
                        </div>

                    
                        </div>
                        </div>

                    </p> <br><br>

                    <p> <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <textarea class="form-control" name="extenso">
                          
                          </textarea>
                          
                        </div>
                      </div>
                    </p> <br><br /> <br>

                     <p> <div class="form-group">
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control dataValor"  placeholder="Data do pagamento" type="date" name="data_pagamento"  required autofocus disabled ></div>
                        </div>
                        <div class="col-md-7">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control dataValor" placeholder="Valor do recibo" type="text" name="amount" required autofocus disabled></div>
                        </div>
                      </div>
                    </p> <br><br/>

                     <p> <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                          <input class="form-control benificiario"   placeholder="Benificiario" type="text" name="benificiario" required autofocus disabled></div>
                        </div>
                      </div>
                    </p> <br><br />

                     <p> <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                          <input class="form-control testemunha"  placeholder="Testemunha" type="text" name="testemunha" required autofocus disabled></div>
                        </div>
                      </div>
                    </p> <br><br />

                     <p> <div class="form-group">
                        <div class="col-md-12">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-university"></i></span>
                          <input class="form-control banco"  placeholder="Banco" type="text" name="banco" required autofocus  disabled></div>
                        </div>
                      </div>
                    </p> <br>

                     


                </div>
                   <!--and files-->
                     <div class="modal-footer">
                        <button id="save" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button>
                      </div>
                </form>
                 <!-- /.modal-content -->   
                <div id="toast"><div id="img"></div><div id="desc"><span id="res_message"></div></div>
          </div>
          <!-- /.modal-dialog -->
   </div>
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


<script>


    function formaPagamento(data) {
        if (data == 'Deposito') {
            $(".dataValor").removeAttr('disabled');
            $(".benificiario").removeAttr('disabled');
            $(".banco").removeAttr('disabled');
            $(".testemunha").prop('disabled', true);

            $(".testemunha").val('');

        } else if (data == 'Cash') {
            $(".dataValor").removeAttr('disabled');
            $(".testemunha").removeAttr('disabled');
            $(".benificiario").removeAttr('disabled');
            $(".banco").removeAttr('disabled');

            $(".banco").val('');

        } else if (data == 'TRF') {
            $(".dataValor").removeAttr('disabled');
            $(".benificiario").removeAttr('disabled');
            $(".testemunha").prop('disabled', true);
            $(".banco").removeAttr('disabled');


            $(".benificiario").val('');
            $(".testemunha").val('');
            $(".banco").val('');

        } else if (data == 'Cheque') {
            $(".dataValor").removeAttr('disabled');
            $(".benificiario").removeAttr('disabled');
            $(".banco").removeAttr('disabled');
            $(".testemunha").removeAttr('disabled');



            $(".testemunha").val('');

        } else {
            $(".dataValor").prop('disabled', true);
            $(".dataValor").val('');
        };

    }

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
