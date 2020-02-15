@extends('adminlte::page')

@section('title','Prospecções')
@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i> </a>

    </h1>

@stop
@section('content_header')
@stop

@section('content')
@include('notification')

          <!-- general form elements -->
         <div class="box box-solid box-danger">
        <div class="box-header with-border">
        <center><h3 class="box-title"><strong>Situacao na Seguradora: {{str_pad( $id, 6, "0", STR_PAD_LEFT)}}</strong></h3></center>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="seguradora" method="post" enctype="multipart/form-data" action="javascript:void(0)">
        <div class="box-body">
        <div class="box box-danger">
             @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
            <input type="hidden" name="recibo_id" value="{{$id}}" />


                <div class="row">
                    <div class="col-xs-3">
                    <label for="ref_prestacao"> Referencia da Prestacao</label>
                        @if(isset($data->ref_prestacao))
                        <input class="form-control" name="ref_prestacao" id="ref_prestacao" placeholder="PC01.GA.13.01.2020" type="text" value="{{$data->ref_prestacao}}">
                        @else
                        <input class="form-control" name="ref_prestacao" id="ref_prestacao" placeholder="PC01.GA.13.01.2020" type="text" >
                        @endif
                    </div>
                                
                    <div class="col-xs-3">
                    <label for="data_p"> Data da prestacao</label>
                        @if(isset($data->data_p))
                        <input class="form-control" name="data_p" id="data_p" placeholder="2020/01/13" type="date"  value="{{$data->data_p}}">
                        @else
                        <input class="form-control" name="data_p" id="data_p" placeholder="2020/01/13" type="date" >
                        @endif
                    </div>

                    <div class="col-xs-3">
                    <label for="n_cheque"> Numero de Cheque</label>
                        @if(isset($data->n_cheque))
                        <input class="form-control" name="n_cheque"  id="n_cheque" placeholder="0003816087" type="text"  value="{{$data->n_cheque}}">
                        @else
                        <input class="form-control" name="n_cheque"  id="n_cheque" placeholder="0003816087" type="text"  >
                        @endif
                    </div>

                    <div class="col-xs-3">
                    <label for="n_recibo"> Numero do recibo</label>
                        @if(isset($data->n_recibo))
                        <input  class="form-control" name="n_recibo" id="n_recibo"  type="text" placeholder="CD2002259210\S13" value="{{$data->n_recibo}}">
                        @else
                        <input  class="form-control" name="n_recibo" id="n_recibo"  type="text" placeholder="CD2002259210\S13" >
                        @endif
                    </div>

                    </div><br>

                    <div class="row">  
            
                    <div class="col-xs-3">
                    <label for="data_r"> Data do recibo</label>
                        @if(isset($data->data_r))
                        <input class="form-control" name="data_r" id="data_r" placeholder="2020/01/13" type="date"  value="{{$data->data_r}}">
                        @else
                        <input class="form-control" name="data_r" id="data_r" placeholder="2020/01/13" type="date">
                        @endif
                    </div>

                    <div class="col-xs-3">
                    <label for="estado"> Estado</label>
                        @if(isset($data->estado))
                        <input class="form-control" name="estado" id="estado" placeholder="PENDENTE" type="text"  value="{{$data->estado}}">
                        @else
                        <input class="form-control" name="estado" id="estado" placeholder="PENDENTE" type="text"  >
                        @endif
                    </div> 
            
                    <div class="col-xs-3">
                    <label for="data_e"> Data de entrada</label>
                        @if (isset($data->data_e))
                        <input class="form-control" name="data_e" id="data_e" placeholder="2020/01/13" type="date"  value="{{$data->data_e}}">
                        @else
                        <input class="form-control" name="data_e" id="data_e" placeholder="2020/01/13" type="date"  >
                        @endif
                    </div>

                    </div><br>


                </div> 
  
                            
                </div>

                

                        <!-- /.box-body -->
                        <div class="box-footer">
                                
                                <center><button id="save" type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                            </div>
                           
                        </form>


                      
          </div>
          <!-- /.box --> 
<script>
    if ($("#seguradora").length > 0) {

        
    $("#seguradora").validate({
      
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#save').html('Updating..');
      $.ajax({
        url: '{{url('admin/savesituacao')}}',
        type: "POST",
        data: $('#seguradora').serialize(),
          success: function (response) {
              if (response.status==false) {
                  toastr.error(response.msg);

              } else if (response.status==true)
                {
                   toastr.success(response.msg);
                }
              else{
                  response.errors.forEach(myFunction);

                  function myFunction(item, index) {
                       toastr.error(item);
                      
                    }
              }
            $('#message').val('');

            $('#save').html('Submeter');



 

        }
      });
    }
  })
}



</script>
@stop