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
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i>Telefone</center></th>
          <th scope="col"><center><i class="fa fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-user"></i> Tipo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>   Gerado em </center> </th>
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
            <td>{{$cliente->cliente_telefone_1 }}</td>
            <td>{{$cliente->cliente_email }}</td>
            <td>{{$cliente->cliente_tipo }}</td>
            <td>{{($cliente->created_at)->diffForHumans() }}</td>
            <td>
                @if($cliente->status==1)
                <span class="sucess">Ativo</span>
                @else
                <span class="error">Desativado</span>
                @endif
            </td>
             <td><center>
                 <a href="{{url('admin/contrato',$cliente->id)}}" class="btn btn-danger btn-xs">Contrato</a>
                 <a href="{{url('admin/prospecoes',$cliente->id)}}" class="btn bg-orange  btn-xs">Prospeção</a>
             </center></td>
        </tr>  
      @endforeach
     
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i> País </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Cidade</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i>Telefone</center></th>
          <th scope="col"><center><i class="fa fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-user"></i> Tipo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>   Gerado em </center> </th>
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
