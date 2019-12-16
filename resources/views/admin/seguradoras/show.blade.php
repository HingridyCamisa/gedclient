

@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/seguradoras/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
@stop


@section('content')
<div class="col-md-12">
          <!-- general form elements -->
          <div class="box  box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-fw fa-institution"></i> Ramos da Seguradora </strong> <i> {{$seguradora->nome_seguradora}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-institution"></i> Ramo</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-balance-scale"></i> Taxa de Corretagem</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($tipo_seguro as $tipo)
        <tr>
          <th><center>{{$tipo->id }}</center></th>
          <td><center>{{$tipo->ramo}}</center></td>
          <td><center>{{ number_format($tipo->taxa_corretagem, 2, ',', '.') }} </center></td>                                  
      @endforeach
      
      </tbody>

      
    </table>

                        <!-- /.box-header -->
          </div>
          <!-- /.box -->
    </div>

    

@stop