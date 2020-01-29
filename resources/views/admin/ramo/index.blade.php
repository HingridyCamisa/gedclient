@extends('adminlte::page')

@section('title','Ramo')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/ramo') }}"><i class="fa fa-fw fa-plus"></i> </a>
    </h1>

@stop

@section('content')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong> Ramo Seguradora </strong></h3></center>

              
     </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acção </center></th>
        </tr>
      </thead>
      <tbody>
     @if(isset($ramos) )
    @foreach($ramos as $key => $ramo)
        <tr>
          <th><center>{{++$key}}</center></th>
          <td><center>{{$ramo->ramo}}</center></td>
          <td><center>
          {!! Form::open(['method' => 'DELETE','route' => ['ramo.destroy', $ramo->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
      @endif
      </tbody>
      <tfoot>
        <tr class="table-danger">
        <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções </center></th>
        </tr>
      </tfoot>
    </table>

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



   </div>


@stop
