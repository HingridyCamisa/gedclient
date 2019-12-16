@extends('adminlte::page')

@section('title','Consultor')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/consultor') }}"><i class="fa fa-fw fa-plus"></i> </a>
    </h1>

@stop

@section('content')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-user"></i> Consultores </strong></h3></center>

              
     </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i> Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Contacto </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Data Nascimento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-briefcase"></i> N Contratos </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções </center></th>

        </tr>
      </thead>
      <tbody>
      @foreach($consultor as $consultores)
        <tr>
          <th><center>{{ ++$i}}</center></th>
          <td><center>{{$consultores->nome_consultor }}</center></td>
          <td><center>{{$consultores->email_consultor }}</center></td>
          <td><center>{{$consultores->telefone_consultor }}</center></td>
          <td><center>{{ Carbon\Carbon::parse($consultores->data_nascimento)->format('d-m-Y ') }}</center></td>
          <td><center> <a hreg="#">1</a></center></td>
          <td><center><a href="{{ route ('consultor.edit', $consultores->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
              @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['consultor.destroy', $consultores->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
              <a href="{{ url('/sms') }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-envelope"></i></a>

          </td>


          @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-envelope"></i> Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Contacto </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-birthday-cake"></i> Data Nascimento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-briefcase"></i> N Contratos </center></th>
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

 {{ $consultor->links() }}
@stop
