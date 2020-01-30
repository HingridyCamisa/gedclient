@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/clientes')}}"><i class="fa  fa-arrow-left"></i></a>
  <a href="#" type="button" onclick="printDiv('printableArea')" class="btn btn-danger"><i class="fa fa-print fa-1x" aria-hidden="true"></i></a>
  <a href="{{url('admin/files/anexos',$cliente->token_id)}}" class="btn btn-danger"><span class="badge bg-teal">{{$anexos}}</span>  <i class="fa fa-file-pdf-o" ></i></a>
  </h1>
    
@stop

@section('content')

<page id="printableArea" name="printableArea">  

   <div class="box box-solid box-danger">
         <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes do Cliente </strong> <i> {{$cliente->nome_segurado}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>

        <tr >
          <th width="300px">Codigo</th>
          <td><i class="fa fa-key"></i> &nbsp; M{{str_pad($cliente->id, 6, "0", STR_PAD_LEFT)}}</td> 
        </tr>
        <tr>
          <th>Nome </th>
          <td><i class="fa fa-user"></i> &nbsp; {{$cliente->cliente_nome }}</td>
        </tr>
         @if($cliente->cliente_tipo=='Individual')
        <tr>
          <th>Tipo de ID </th>
          <td><i class="fa fa-list-alt"></i> &nbsp; {{$cliente->cliente_id_tipo }}</td>
        </tr>
        
        <tr>
          <th>Nº ID </th>
          <td><i class="fa fa-key"></i> &nbsp; {{$cliente->cliente_id_numero }}</td>
        </tr>
        <tr>
        <tr>
          <th>Genero </th>
          <td><i class="fa fa-transgender"></i> &nbsp; {{$cliente->cliente_genero }}</td>
        </tr>
         @endif
        <tr>
          <th>Endereço</th>
          <td><i class="fa fa-map-marker"></i> &nbsp; {{$cliente->cliente_endereco }}</td>
        </tr>
        <tr>
          <th>País</th>
          <td><i class="fa  fa-map-marker"></i> &nbsp; {{$cliente->client_country_city->country_name }}</td>
        </tr>
        <tr>
          <th>Província</th>
          <td><i class="fa  fa-map-marker"></i> &nbsp; {{$cliente->client_country_city->state_name }}</td>
        </tr>
        <tr>
        <tr>
          <th>Telefone 1</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$cliente->cliente_telefone_1 }}</td>
        </tr>
        <tr>
          <th>Telefone 2</th>
          <td><i class="fa fa-phone"></i> &nbsp; {{$cliente->cliente_telefone_2 }}</td>
        </tr>
        <tr>
        <tr>
          <th>Email</th>
          <td><i class="fa fa-envelope"></i> &nbsp; {{$cliente->cliente_email }}</td>
        </tr>
        <tr>
        <tr>
          <th>Tipo de Cliente</th>
          <td> &nbsp; {{$cliente->cliente_tipo }}</td>
        </tr>
        <tr>
          <th>Data de Nascimento</th>
          <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($cliente->cliente_data_nascimento)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <th>Notas</th>
          <td><i class="fa fa-info"></i> &nbsp; {{$cliente->notas}}</td>
        </tr>
      </tbody>
    </table> 
    </div>
       <!-- /.box-header -->


    @if($cliente->cliente_tipo!='Individual')
       <div class="box box-solid box-danger">
         <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-briefcase"></i> Detalhes de Pessoa de Contacto </strong> <i> {{$cliente->nome_segurado}} </i></h3></center>
         </div>

            <table class="table table-striped table-bordered table-hover">
     
              <tbody>
                <tr>
                  <th width="300px">Nome </th>
                  <td><i class="fa fa-user"></i> &nbsp; {{$cliente->pessoa_contacto_nome }}</td>
                </tr>
                <tr>
                  <th>Tipo de ID </th>
                  <td><i class="fa fa-user"></i> &nbsp; {{$cliente->pessoa_contacto_id_tipo }}</td>
                </tr>
                <tr>
                  <th>Nº ID </th>
                  <td><i class="fa fa-user"></i> &nbsp; {{$cliente->pessoa_contacto_id_numero }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Genero </th>
                  <td><i class="fa fa-transgender"></i> &nbsp; {{$cliente->pessoa_contacto_genero }}</td>
                </tr>
                <tr>
                  <th>Endereço</th>
                  <td><i class="fa fa-institution"></i> &nbsp; {{$cliente->pessoa_contacto_endereco }}</td>
                </tr>
                @if(isset($cliente->pessoa_country_city))
                <tr>
                  <th>País</th>
                  <td><i class="fa  fa-map-pin"></i> &nbsp; {{$cliente->pessoa_country_city->country_name }}</td>
                </tr>
                <tr>
                  <th>Província</th>
                  <td><i class="fa  fa-map-pin"></i> &nbsp; {{$cliente->pessoa_country_city->state_name }}</td>
                </tr>
                  @endif
                <tr>
                <tr>
                  <th>Telefone 1</th>
                  <td><i class="fa fa-phone"></i> &nbsp; {{$cliente->pessoa_contacto_telefone_1 }}</td>
                </tr>
                <tr>
                  <th>Telefone 2</th>
                  <td><i class="fa fa-phone"></i> &nbsp; {{$cliente->pessoa_contacto_telefone_2 }}</td>
                </tr>
                <tr>
                <tr>
                  <th>Email</th>
                  <td><i class="fa fa-envelope"></i> &nbsp; {{$cliente->pessoa_contacto_email }}</td>
                </tr>
                <tr>
                 @if(isset($cliente->pessoa_contacto_data_nascimento))
                <tr>
                  <th>Data de Nascimento</th>
                  <td><i class="fa fa-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($cliente->pessoa_contacto_data_nascimento)->format('d-m-Y') }}</td>
                </tr>
                 @endif
              </tbody>
            </table> 
    </div>
    @endif
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
                <input type="hidden" name="task_id" id="task_id" value="{{$cliente->id}}" />
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" /> 
                <input type="hidden" name="token_id" id="token_id" value="cliente"/> 


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
            data: {'task_id': $('#task_id').val() , 'token_id':'cliente'},
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

