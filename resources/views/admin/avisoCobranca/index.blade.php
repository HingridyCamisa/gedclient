@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Avisos </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Telefone 1</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Telefone 2</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data fim do Aviso </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Espirado? </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Nº do Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Estado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Tipo de Contrato</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de atualização</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($avisos as $i => $aviso)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          <th><center><a href="{{ route ('clientes.show',$aviso->cliente)}}">{{ $aviso->cliente_nome }}</a></center></th>
          <th><center>{{ $aviso->cliente_email }}</center></th>
          <th><center>{{ $aviso->cliente_telefone_1 }}</center></th>
          <th><center>{{ $aviso->cliente_telefone_2 }}</center></th>
          <th><center>{{ $aviso->aviso_data}}</center></th>
          <th><center>
                 @if(($data=\Carbon\Carbon::parse($aviso->aviso_data))->isPast())
                    <i class="fa fa-close text-red"></i> Expirado  {{$data->diffForHumans()}}
                 @else
                    <i class="fa fa-check text-green"></i> Em dia  {{$data->diffForHumans()}}
                 @endif
           </center></th>
          <th><center>
              @if($aviso->tipo=='contratos')
              <a href="{{url('admin/contrato/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
              @else
               <a href="{{url('admin/saude/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
             @endif
          </center></th>
          <th><center>
                 @if($aviso->tipo=='saudes')
                    <span class="label bg-green">Saude</span>
                 @else
                    <span class="label  bg-blue">Contrato</span> 
                 @endif
          </center></th>
          <th><center>
              @if($aviso->status==1)
              <span class="label label-danger">Não pago</span> 
              @elseif($aviso->status==2)
              <span class="label label-warning">Pago</span> 
              @endif
              </center></th>
          <th><center> {{number_format($aviso->aviso_amount , 2, ',', ' ') }}</center></th>
          <th><center>{{ $aviso->updated_at }}</center></th>
      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Telefone 1</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Telefone 2</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data fim do Aviso </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Espirado? </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Nº do Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Estado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Tipo de Contrato</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de atualização</center></th>
          </tr>
      </tfoot>
    </table>
   </div>




<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 0, "asc" ]],
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


 {{ $avisos->links() }}

@stop
