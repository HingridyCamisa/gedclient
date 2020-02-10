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
          <th scope="col"><center><i class="fa fa-fw fa-map-marker"></i> País </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-marker"></i> Cidade</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i>Telefone</center></th>
          <th scope="col"><center><i class="fa fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-user"></i> Tipo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>   Gerado em </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-check-square"></i> Tornar</center></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-marker"></i> País </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-marker"></i> Cidade</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i>Telefone</center></th>
          <th scope="col"><center><i class="fa fa-envelope"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-user"></i> Tipo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>   Gerado em </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Estado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
         
          <th scope="col"><center><i class="fa fa-fw fa-check-square"></i> Tornar</center></th>
       
          </tr>
      </tfoot>
    </table>
   </div>



<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        serverSide: true,
        processing: true,
        responsive: true,
        "order": [[0, "desc"]],
        dom: 'Bfrtip',
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
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
        ],


        "ajax": "{{ url('admin/getdataClientes') }}",


            "columns": [
                {"data":"idx"},
                {"data":"cliente_nome"},
                {"data":"country_name", "name":'uvw_country_states.country_name'},
                {"data":"state_name", "name":'uvw_country_states.state_name'},
                {"data":"cliente_telefone_1"},
                {"data":"cliente_email"},
                {"data":"cliente_tipo"},
                {"data":"created_at"},

               {
                  data: null,
                  render: function ( data, type, row ) {
                    if (data.status==1) 
                    {
                      $result ='<span class="sucess"><center>Ativo</center></span>';
                    }else{
                      $result='<span class="error"><center>Desativado</center></span>';

                    }
                    return $result;
                  },
                  'name':'cliente_nome'
                },

                {
                  data: null,
                  render: function ( data, type, row ) {
                    $urledit=window.location.href+'/'+data.id+'/edit';
                    $urlshow=window.location.href+'/show/'+data.id;
                    $urlextrato=window.location+'/financas/extrato/'+data.token_id;
                    $urldelete=window.location.href+'/delete/'+data.id;
                    if (data.status==1) {
                      $delete='<a href="'+$urldelete+'" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash-o"></i></a>';

                    }else{
                      $delete='<a href="'+$urldelete+'" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-recycle"></i></a>';

                    }

                    $return='<center class="row"><a href="'+$urledit+'" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a><a href="'+$urlshow+'" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a><a href="'+$urlextrato+'" class="btn btn-success btn-xs"><i class="fa fa-pie-chart"></i></a>'+$delete;

                    return $return;
                  },
                  'name':'cliente_nome'
                },
                {
                  data:null,
                  render:function(data,type,row){

                    return '<a href="{{url("admin/contrato")}}/'+data.id+'" class="btn btn-danger btn-xs">Contrato</a><a href="{{url("admin/prospecoes")}}/'+data.id+'" class="btn btn-success  btn-xs">Prospeção</a><a href="{{url("admin/saude")}}/'+data.id+'" class="btn btn-primary  btn-xs">Saúde</a></center>';
                  },
                  'name':'cliente_nome'
                }

                
            ]
    } );
} );
</script>

 {{ $clientes->links() }}

@stop
