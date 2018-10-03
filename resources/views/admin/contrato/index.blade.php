@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
    <h1><a class="btn btn-success"  href="{{ url('admin/contrato') }}"><i class="fa fa-fw fa-plus"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-pdf-o"></i> </a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-excel-o"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-print"></i></a></h1>
@stop

@section('content')
 <div class="box box-solid box-success">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Contratos </strong></h3></center>

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
      </thead>
      <tbody>
      @foreach($contratos as $contrato)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          <td><center>{{$contrato->consultor }}</center></td>  
          <td><center>{{$contrato->nome_segurado }}</center></td> 
          <td><center>{{$contrato->nome_seguradora }}</center></td> 
          <td><center>{{$contrato->numero_apolice }}</center></td> 
          <td><center>{{$contrato->tipo_seguro }}</center></td> 
          <td><center>{{ Carbon\Carbon::parse($contrato->data_proximo_pagamento)->format('d-m-Y ') }}</center></td>
          <td><center>{{$contrato->situacao }}</center></td>
          @if(\Carbon\Carbon::parse($contrato->data_proximo_pagamento)->isPast())       
          <td><center><i class="fa fa-close text-red"></i> Expirado</center></td>
          @else
           <td><center><i class="fa fa-check text-green"></i> Em dia</center></td>
           @endif
          <td><center><a href="{{ route ('contratos.edit', $contrato->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>
             
              <a href="{{ route ('contratos.show', $contrato->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
              @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['contrato.destroy', $contrato->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif    
              </center>   
          </td>
          
                                    
         
      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-success">
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
        
 {{ $contratos->links() }}

@stop