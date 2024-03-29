@extends('adminlte::page')

@section('title', 'Seguradoras')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/seguradoras')}}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-institution"></i> Seguradoras</strong></h3></center>
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-pin"></i> Endereço</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Contacto</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i> Email</center></th>
          <th scope="col"><center>Tipo Seguro</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user-secret"></i> Gestor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($seguradoras as $seguradora)
        <tr>
          <th><center>{{ ++$i}}</center></th>
          <td><center>{{$seguradora->nome_seguradora }}</center></td>
          <td><center>{{$seguradora->endereco_seguradora }}</center></td>
          <td><center>{{$seguradora->contacto_seguradora }}</center></td>
          <td><center>{{$seguradora->email_seguradora }}</center></td>
          <td><center>{{$seguradora->tipo_seguro }}</center></td>
          <td><center>{{$seguradora->gestor }}</center></td>
          <td><center><a href="{{ route ('seguradora.edit', $seguradora->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
              <a href="{{ route ('seguradora.show', $seguradora->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
              @can('seguradoras_destroy')
              {!! Form::open(['method' => 'DELETE','route' => ['seguradora.destroy', $seguradora->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
          </td>
      @endforeach
      </tr>
      </tbody>
      <tfoot>
      <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-pin"></i> Endereço</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Contacto</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i> Email</center></th>
          <th scope="col"><center>Tipo Seguro</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user-secret"></i> Gestor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
        </tr>
      </tfoot>
    </table>
   </div>


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
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

 {{ $seguradoras->links() }}

@stop
