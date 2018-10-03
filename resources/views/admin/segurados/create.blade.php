@extends('adminlte::page')

@section('title', 'Adicionar Segurado')

@section('content_header')

    <h1><a class="btn btn-primary"  href="{{ url('admin/segurados/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
   
@stop

@section('content')

<div class="col-md-12">

          <!-- general form elements -->
          <div class="box box-solid box-success">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-users"></i> Adicionar Segurado</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('segurados.store') }}">
                @csrf
              <div class="box-body">
                    
                    <div class="row">
                        <div class="col-xs-4">
                             <label for="NomeSegurado"><i class="fa fa-user"></i> Nome Segurado </label>
                             <input class="form-control" name="nome_segurado" placeholder="Nome e Apelido" type="text">
                                            
                         </div>
                         
                        <div class="col-xs-4">
                             <label for="NomeSConsultor"><i class="fa fa-user"></i> Nome Consultor</label>
                             
                             <select class="form-control" name="nome_consultor">
                             @foreach($segurados as $segurado)
                                <option>{{ $segurado->nome_consultor}}</option>
                             @endforeach
                             </select>
                        </div>
                       
                        <div class="col-xs-4">
                            <label for="NomeSeguradora"><i class="fa fa-institution"></i> Nome Seguradora </label>
                            <select class="form-control" name="nome_seguradora">
                            @foreach($seguradoras as $seguradora)
                                <option>{{ $seguradora->nome_seguradora}}</option>
                             @endforeach
                             </select>
                        </div>
                                   
                     </div><br>

                     <div class="row">
                        <div class="col-xs-4">
                            <label for="ContactoSegurado"><i class="fa fa-phone-square"></i> Contacto</label>
                            <input class="form-control" name="contacto_segurado" placeholder="212121123" type="text">            
                         </div>
                        <div class="col-xs-4">
                            <label for="EnderecoSegurado"><i class="fa fa-map-pin"></i> Endereço</label>
                            <input class="form-control" name="morada_seguardo" placeholder="Av. Ahmed Sekou Toure, n 841, 1 andar" type="text">
                        </div>
                        <div class ="col-xs-4">
                                <label for="DataNascimento"><i class="fa fa-calendar"></i> Data Nascimento</label>
                                <input class="form-control" name="data_nascimento" placeholder="" type="date">
                            </div>
                     </div> <br>

                                

                      <div class="row">

                            <div class ="col-xs-4">
                            <label for="generosegurado"><i class="fa fa-venus-mars"></i> Género</label>
                                <div class="form-radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="genero_segurado" value="1">Femenino
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="genero_segurado" value="0">Masculino
                                    </label>
                                </div>
                            </div>

                            <div class ="cols-xs-4">
                                <label for="DataNascimento"><i class="fa fa-users"></i> Dependentes</label>
                                <div class="form-radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="dependentes" value="1">Sim
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="dependentes" value="0">Não
                                    </label>
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
    </div>

@stop