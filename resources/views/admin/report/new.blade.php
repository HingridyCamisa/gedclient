@extends('adminlte::page')

@section('title','Anexos')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa  fa-arrow-left"></i></a>
    </h1>
@stop

@section('content')
@include('notification')

<div class="row">
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Detalhes dos clientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST" action="{{ url('admin/report/filtro')}}" enctype="multipart/form-data">
                     @csrf
                    <input name="type" value="rep_clientes_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="created_at" selected>Data de Criacao</option>
                        <option value="updated_at"> Data de Atualizacao</option>
                    </select>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="start" required autofocus ></div>
                            </div>

                    
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="end" required autofocus ></div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary btn-flat "><i class="fa fa-download"></i></button>
                </span>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Extrato dos clientes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST" action="{{ url('admin/report/filtro')}}" enctype="multipart/form-data">
                     @csrf
                    <input name="type" value="extrato_clientes" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="data_inicio" selected>Data inicio </option>
                        <option value="data_fim"> Data Fim</option>
                    </select>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="start" required autofocus ></div>
                            </div>

                    
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="end" required autofocus ></div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary btn-flat "><i class="fa fa-download"></i></button>
                </span>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Contrato</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST" action="{{ url('admin/contratos/expira/filtro')}}" enctype="multipart/form-data">
                    <select class="form-control">
                        <option value="criacao">Data de Criacao</option>
                        <option value="actualizacao"> Data de Atualizacao</option>
                        <option>option 3</option>
                    </select>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="start" required autofocus ></div>
                            </div>

                    
                            <div class="col-md-6">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                <input class="form-control"  type="date" name="end" required autofocus ></div>
                            </div>
                        </div>
                    </div>
                    <hr />
                <span class="input-group-btn">
                 <button type="submit" class="btn btn-primary btn-flat "><i class="fa fa-download"></i></button>
                </span>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


@stop