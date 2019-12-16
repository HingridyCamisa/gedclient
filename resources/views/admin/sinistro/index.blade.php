@extends('adminlte::page')

@section('title', 'Segurados')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/sinistro')}}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-subway"></i> Sinistros</strong></h3></center>
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-subway"></i> Sinistro </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i>Segurado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
        </tr>
      </thead>
      <tbody>
          @foreach($sinistros as $sinistro)
      <tr>
          <th><center>{{ ++$i }}</center></th>
          <td><center>{{ $sinistro->sinistro }}</center></td>
          <td><center>{{ $sinistro->nome_segurado }}</center></td>
          <td><center>{{ $sinistro->seguradora }}</center></td>
          <td><center>{{ $sinistro->consultor }}</center></td>
          <td><center>{{ $sinistro->situacao }}</center></td>
          <td><center><a href="{{ route ('sinistros.edit', $sinistro->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
              <a href="{{route ('sinistros.show', $sinistro->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
              @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['sinistros.destroy', $sinistro->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
              </center>
          </td>

          @endforeach
      </tr>
      </tbody>
      <tfoot>
      <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-subway"></i> Sinistro </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i>Segurado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação</center></th>
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


   {{ $sinistros->links()}}

@stop
