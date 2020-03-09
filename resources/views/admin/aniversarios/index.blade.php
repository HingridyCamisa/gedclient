@extends('adminlte::page')

@section('title','Aniversarios')


@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-birthday-cake"></i>  {{\Carbon\Carbon::now()->format('F')}} </strong></h3></center>

              
     </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
    
    <thead>
        <tr class="table-success">
        <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Aniversariante </center></th>
        <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data do Aniversario</center></th>
        <th scope="col"><center><i class="fa fa-fw fa-info"></i> Estado</center></th>
        <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Acção </center></th>
      

        </tr>
      </thead>
      <tbody>
      @foreach($cliente as $key => $cliente)
      <tr>
          @if($cliente->cliente_tipo == 'Individual' && $cliente->cliente_data_nascimento!=null)  
            @if(\Carbon\Carbon::parse($cliente->cliente_data_nascimento)->isBirthday(\Carbon\Carbon::today()))

            <td><center>{{$cliente->cliente_nome }}</center></td>
            <td><center>{{$cliente->cliente_data_nascimento }}</center></td>
            <td><center>Pendente</center></td>
            <td><center><a href="{{ url('admin/email/'.$cliente->id.'/clientes') }}" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-envelope"></i></a></center></td>
            @endif
          @endif
      @endforeach     
        </tr>  
    
     
   
      </tbody>
      <tfoot>
          <tr class="table-success">
          <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Aniversariante</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data do Aniversario</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-info"></i> Estado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Acção </center></th>

        </tr>
      </tfoot>
    </table>

    <script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 6, "desc" ]],
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

   </div>


@stop
