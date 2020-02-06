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
              <h3 class="box-title">Aviso de Cobranca + Recibo</h3>

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
                    <input name="type" value="avisocobrancarecibo_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="aviso_data" selected>Data do Aviso </option>
                        <option value="created_at"> Data de criacoo</option>
                        <option value="updated_at"> Data de atualizacoo</option>
                        <option value="data_pagamento"> Data de pagamento</option>
                        <option value="data_atualizacao"> Data de pagamento atualizacoo</option>
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


<div class="row">
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Avisos de cobranca</h3>

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
                    <input name="type" value="avisocobranca_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="created_at" selected>Data de Criacao</option>
                        <option value="updated_at"> Data de Atualizacao</option>
                        <option value="aviso_data"> Data do Aviso</option>
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
              <h3 class="box-title">Contratos</h3>

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
                    <input name="type" value="rep_contratos_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="created_at" selected>Data de inicio</option>
                        <option value="data_proximo_pagamento"> Data de fim</option>
                        <option value="created_at"> Data de criacao</option>
                        <option value="updated_at"> Data de atualizacaoo</option>
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
              <h3 class="box-title">Prospecoes</h3>

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
                    <input name="type" value="avisocobrancarecibo_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="aviso_data" selected>Data do Aviso </option>
                        <option value="created_at"> Data de criacoo</option>
                        <option value="updated_at"> Data de atualizacoo</option>
                        <option value="data_pagamento"> Data de pagamento</option>
                        <option value="data_atualizacao"> Data de pagamento atualizacoo</option>
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



<div class="row">
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Contrato de saude</h3>

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
                    <input name="type" value="rep_saudes_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="created_at" selected>Data de inicio</option>
                        <option value="data_proximo_pagamento"> Data de fim</option>
                        <option value="created_at"> Data de criacao</option>
                        <option value="updated_at"> Data de atualizacao</option>
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
              <h3 class="box-title">Sinistros</h3>

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
                    <input name="type" value="rep_sinistros_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="created_at" selected>Data de criacao </option>
                        <option value="updated_at"> Data de actualizacao</option>
                        <option value="data_sinistro"> Data do Sinistro</option>
                        <option value="data_participacao_almond"> Data da participacao amana</option>
                        <option value="data_participacao_seguradora"> Data da participacao  na seguradora</option>
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
              <h3 class="box-title">Aviso + Pagamentos</h3>

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
                    <input name="type" value="rep_finacas_avisos_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="aviso_data" selected>Data do Aviso </option>
                        <option value="data recibo"> Data de pagamento</option>
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


<div class="row">
        <div class="col-md-4">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Comissoes</h3>

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
                    <input name="type" value="rep_comissoes_view" type="hidden">
                    <select class="form-control" name="filtro">
                        <option value="data_pagamento" selected>Data de pagamento</option>
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

</div>

@stop
