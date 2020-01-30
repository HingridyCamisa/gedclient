@extends('adminlte::page')

@section('title', 'Adicionar Ramo')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/ramo/index')}}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
   
@stop

@section('content')
@include('notification')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
              <div class="box-header with-border">
              <center><h3 class="box-title"><strong><i class="fa fa-user"></i> Adicionar Ramo</strong></h3></center>
              </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('ramo.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
              <div class="box-body">
                     
                          <div class="form-group">
                            <label for="NomeRamo"><i class="fa fa-user"></i> Ramo </label>
                            <input class="form-control" name="ramo" placeholder="Ramo" type="text" value="{{old('ramo')}}">
                          </div>
              </div>
              <!-- /.box-body -->

                  <div class="box-footer">
                   
                    <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                    
                  </div>
            </form>
          </div>
          <!-- /.box -->

  

@stop