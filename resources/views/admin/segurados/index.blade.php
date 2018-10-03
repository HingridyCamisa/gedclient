@extends('adminlte::page')

@section('title', 'Segurados')

@section('content_header')
    <h1><a class="btn btn-success"  href="{{ url('admin/segurados')}}"><i class="fa fa-fw fa-plus"></i> Adicionar</h1></a>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-print"></i>Imprimir</a></li>
      <li><a href="#"><i class="fa fa-fw fa-file-pdf-o"></i>Pdf</a></li>
      <li><a href="#"><i class="fa fa-fw fa-file-excel-o"></i>Excel</a></li>
    </ol>
@stop

@section('content')
 <div class="box box-solid box-success">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-users"></i> Segurados</strong></h3></center>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
     </div>
     <table class="table">
    <thead>
        <tr class="table-success">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Nome Segurado </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i>Nome Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-map-pin"></i> Endereço</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-phone"></i> Contacto</center></th>   
          <th scope="col"><center><i class="fa fa-fw fa-folder-open"></i> Nº Contratos</center></th>   
          <th scope="col"><center><i class="fa fa-fw fa-edit"></i> Criado em:</center></th>    
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($segurados as $segurado)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          <td><center>{{$segurado->nome_segurado}}</center></td>
          <td><center>{{$segurado->nome_consultor }}</center></td>  
          <td><center>{{$segurado->morada_seguardo }}</center></td>  
          <td><center>{{$segurado->contacto_segurado }}</center></td>  
          <td><center> </center></td>  
          <td><center>{{ Carbon\Carbon::parse($segurado->created_at)->format('d-m-Y H:i') }}</center></td>
          <td><center><a href="{{ route ('segurados.edit', $segurado->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i>Editar</a>
              |
              <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i>Detalhes</a></center>     
          </td>
          
                                    
         
      @endforeach
      </tr>
      </tbody>
    </table>
   </div>
   
  {{ $segurados->links()}}
   
@stop