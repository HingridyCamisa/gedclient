@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/clientes') }}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Contratos </strong></h3></center>

    
     </div>
     <div class="box-body table-responsive no-padding">
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Segurado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice</center></th>
          <th scope="col"><center> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Inicio </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Fim </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i>  Situação </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>

        </tr>
      </thead>
      <tbody>
      @foreach($contratos as $contrato)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          <td><center>{{$contrato->consultorx->nome_consultor}}</center></td>
          <td><center>{{$contrato->cliente->cliente_nome}}</center></td>
          <td><center>{{$contrato->seguradora->nome_seguradora }}</center></td>
          <td><center>{{$contrato->numero_apolice }}</center></td>
          <td><center>{{$contrato->ramo['ramo'] }}</center></td>
          <td><center>{{$contrato->data_inicio}}</center></td>
          <td><center>{{$contrato->data_proximo_pagamento}}</center></td>
          <td><center>{{$contrato->situacao }}</center></td>
          @if(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->isPast())
          <td><center><i class="fa fa-close text-red"></i> Expirado {{\Carbon\Carbon::parse($contrato->data_inicio)->addDays(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->diffInDays($contrato->data_inicio))->diffForHumans()}}</center></td>
          @else
           <td><center><i class="fa fa-check text-green"></i> Em dia {{\Carbon\Carbon::parse($contrato->data_inicio)->addDays(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->diffInDays($contrato->data_inicio))->diffForHumans()}}</center></td>
           @endif
          <td><center><a href="{{ route ('contratos.edit', $contrato->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>

              <a href="{{ route ('contratos.show', $contrato->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
              @can('contratos_destroy')
              {!! Form::open(['method' => 'DELETE','route' => ['contrato.destroy', $contrato->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endcan
              <a href="{{ url('admin/email/'.$contrato->client_id.'/clientes') }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-envelope"></i></a>
              </center>
          </td>



      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
            <th scope="col"><center> Nº</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Segurado</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice</center></th>
            <th scope="col"><center> Ramo</center></th>
            <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Próximo Pagamento </center></th>
            <th scope="col"><center><i class="fa fa-fw fa-money"></i>  Situação </center> </th>
            <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
            <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>

          </tr>
      </tfoot>
    </table>
  </div>
   </div>




<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 6, "desc" ]],
        "columnDefs": [
                        { "type": "date-eu", "targets": 5 }
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


 {{ $contratos->links() }}

@stop
