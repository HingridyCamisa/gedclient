@extends('adminlte::page')

@section('title','Consultor')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/saude')}}"><i class="fa fa-fw fa-plus"></i> </a>
    </h1>

@stop

@section('content')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-medkit"></i> Saúde </strong></h3></center>

              
     </div>

     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> N⁰ de Membro</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-list-alt"></i> Plano </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-venus-mars"></i> Tipo Membro </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>Inicio Cobertura </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>Fim Cobertura </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i>Acções </center></th>

        </tr>
      </thead>
      <tbody>
      @foreach($saude as $saudes)
        <tr>
          <th><center>{{ ++$i}}</center></th>
          <td><center>{{$saudes->nome_segurado }}</center></td>
          <td><center>{{$saudes->numero_membro }}</center></td>
          <td><center>{{$saudes->seguradora }}</center></td>
          <td><center>{{$saudes->plano }}</center></td>
          <td><center>{{$saudes->tipo_membro }}</center></td>
          <td><center>{{ Carbon\Carbon::parse($saudes->data_inicio_cobertura)->format('d-m-Y ') }}</center></td>
          <td><center>{{ Carbon\Carbon::parse($saudes->data_fim_cobertura)->format('d-m-Y ') }}</center></td>
          @if(\Carbon\Carbon::parse($saudes->data_fim_cobertura)->isPast())
            <td><center><i class="fa fa-close text-red"></i> Expirado {{\Carbon\Carbon::parse($saudes->data_inicio_cobertura)->addDays(\Carbon\Carbon::parse($saudes->data_fim_cobertura)->diffInDays($saudes->data_inicio_cobertura))->diffForHumans()}} </center></td>
          @else
            <td><center><i class="fa fa-check text-green"></i> Em dia Expirado {{\Carbon\Carbon::parse($saudes->data_inicio_cobertura)->addDays(\Carbon\Carbon::parse($saudes->data_fim_cobertura)->diffInDays($saudes->data_inicio_cobertura))->diffForHumans()}}</center></td>
           @endif
          <td><center><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
          <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
          <a href="{{ url('/sms') }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-envelope"></i></a>
               
          </td>


          @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
        <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-key"></i> N⁰ de Membro</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Seguradora </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-list-alt"></i> Plano </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-venus-mars"></i> Tipo Membro </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>Inicio Cobertura </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>Fim Cobertura </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i>Acções </center></th>
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