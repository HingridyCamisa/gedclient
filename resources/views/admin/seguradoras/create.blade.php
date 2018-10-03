@extends('adminlte::page')

@section('title', 'Adicionar Seguradora')

@section('content_header')

    <h1><a class="btn btn-primary"  href="{{ url('admin/seguradoras/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
   
@stop

@section('content')


          <!-- general form elements -->
          <div class="box box-solid box-success">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-institution"></i> Adicionar Seguradora</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('seguradora.store') }}">
                @csrf
              <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="NomeSeguradora"><i class="fa fa-institution"></i> Nome</label>
                          <input class="form-control" name="nome_seguradora" placeholder="Almond Brokers" type="tex">
                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                        <label for="EnderecoSeguradora"><i class="fa fa-map-pin"></i> Endereço</label>
                        <input class="form-control" name="endereco_seguradora" placeholder="Av. Ahmed Sekou Toure, n 841, 1 andar" type="text">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="ContactoSeguradora"><i class="fa fa-phone-square"></i> Contacto</label>
                          <input class="form-control" name="contacto_seguradora" placeholder="212121123" type="text">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="EmailSeguradora"><i class="fa fa-envelope"></i> Email</label>
                          <input class="form-control" name="email_seguradora" placeholder="Email@almond.co.mz" type="email">
                        </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="EmailSeguradora">Tipo</label>
                               <select class="form-control" name="tipo_seguro">
                                  <option>Vida</option>
                                  <option>Não Vida</option>
                                  <option>Vida e Não Vida</option>
                              </select>
                          </div>
                        </div>
                      </div>
                    <br>
                        <center><label for="Gestor"><i class="fa fa-user-secret"></i>Gestor Almond</label></center>
                        <!-- <input class="form-control" name="gestor" placeholder="Nome Gestor" type="text"> -->
                      <div class="row"> 
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="Gestor"><i class="fa fa-user"></i> Nome</label>
                              <input class="form-control" name="gestor" placeholder="Nome Gestor" type="text">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="Gestor"><i class="fa fa-phone-square"></i> Contacto</label>
                              <input class="form-control" name="gestor_contacto" placeholder="Contacto Gestor" type="text">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="Gestor"><i class="fa fa-envelope"></i> Email</label>
                              <input class="form-control" name="gestor_email" placeholder="Email Gestor" type="email">
                            </div>
                          </div>
                      </div>
              </div>
              <!-- /.box-body -->

                  <div class="box-footer">
                   
                    <center><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submeter</button></center>
                    
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