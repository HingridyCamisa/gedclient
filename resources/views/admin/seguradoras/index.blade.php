@extends('adminlte::page')

@section('title', 'Seguradoras')

@section('content_header')
    <h1><a class="btn btn-success"  href="{{ url('admin/seguradoras')}}"><i class="fa fa-fw fa-plus"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-pdf-o"></i> </a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-excel-o"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-print"></i></a></h1>
@stop

@section('content')
 <div class="box box-solid box-success">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-institution"></i> Seguradoras</strong></h3></center>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-success">
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
              @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['seguradora.destroy', $seguradora->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
          </td>
      @endforeach
      </tr>
      </tbody>
      <tfoot>
      <tr class="table-success">
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
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>


@stop
