@extends('adminlte::page')

@section('title', 'Adicionar Consultor')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/consultor/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
   
@stop

@section('content')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-user"></i> Adicionar Consultor</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('consultor.store') }}">
                @csrf
              <div class="box-body">
                     
                          <div class="form-group">
                            <label for="NomeConsultor"><i class="fa fa-user"></i> Nome </label>
                            <input class="form-control" name="nome_consultor" placeholder="Nome Consultor" type="text">
                          </div>
                        <div class="form-group">
                          <label for="EmailConsultor"><i class="fa fa-envelope"></i> Email</label>
                          <input class="form-control" name="email_consultor" placeholder="consultor.apelido@amanaseguros.co.mz" type="email">
                        </div>
                     
            
                      <div class="form-group">
                        <label for="ContactoConsultor"><i class="fa fa-phone"></i> Contacto</label>
                        <input class="form-control" name="telefone_consultor" placeholder="212121123" type="text">
                      </div>

                       <div class="form-group">
                        <label for="AniversarioConsultor"><i class="fa fa-birthday-cake"></i> Data de Nascimento</label>
                        <input class="form-control" name="data_nascimento"  type="date">
                      </div>
              </div>
              <!-- /.box-body -->

                  <div class="box-footer">
                   
                    <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                    
                  </div>
            </form>
            @if($errors->any())
              <ul class="alert alert-warning">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
           @endif
          </div>
          <!-- /.box -->

  

@stop