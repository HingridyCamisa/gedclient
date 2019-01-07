@extends('adminlte::page')

@section('title','Aniversarios')


@section('content')
 <div class="box box-solid box-success">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-user"></i> Aniversarios </strong></h3></center>

              
     </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-success">
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
   
      </tbody>
      <tfoot>
        <tr class="table-success">
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
                { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );

    </script>

   </div>


@stop
