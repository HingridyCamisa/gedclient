@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
  
  <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/saude/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
    
@stop

@section('content')
          <!-- general form elements -->
          <div class="box box-solid box-danger">
                 <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-medkit"></i> Detalhes Seguro de Saúde do Cliente </strong> <i> {{$saudes->nome_segurado}} </i></h3></center>
         </div>

    <table class="table table-striped table-bordered table-hover">
     
      <tbody>
        <tr>
          <th>ID</th>
          <td><i class="fa fa-key"></i> &nbsp; {{ $saudes->id}}</td> 
        </tr>
        <tr>
          <th>Nome Cliente</th>
          <td><i class="fa fa-user"></i> &nbsp; {{$saudes->nome_segurado }}</td>
        </tr>


      </tbody>
    </table>

              

@stop