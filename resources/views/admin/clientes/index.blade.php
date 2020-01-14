@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/clientes/create') }}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Clientes </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i> País </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Cidade</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-file-text-o"></i>Nº Apólice</center></th>
          <th scope="col"><center> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Próximo Pagamento </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i>  Situação </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>

        </tr>
      </thead>
      <tbody>
      @foreach($clientes as $cliente)
        <tr>
            <th><center>{{ ++$i }}</center></th>
            <td>{{$cliente->cliente_nome }}</td>
            <td>{{$cliente->client_country_city->country_name}}</td>
            <td>{{$cliente->client_country_city->state_name}}</td>



        </tr>  
      @endforeach
     
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


 {{ $clientes->links() }}

@stop
