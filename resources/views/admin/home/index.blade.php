@extends('adminlte::page')

@section('title', 'SGCCS')

@section('content_header')
    <h1>Carteira Almond Brokers</h1>
@stop

@section('content')
<div class="row">
@if(Auth::user()->cargo =='1')
  <div class="col-md-3">
    <div class="small-box bg-green">
              <div class="inner">
                <!-- <h3>{{ $prospecao->sum('valor_estipulado_carteira')}}</h3>  -->
                <h4><strong>{{ number_format($prospecao->sum('valor_estipulado_carteira'), 2, ',', '.') . 'MTN'}}</strong></h4>
                <p>Valor em Carteira </p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endif
  <div class="col-md-3">
    <div class="small-box bg-yellow">
              <div class="inner">
                <h4><strong>{{ $segurado->count('segurados')}}</strong></h4>

                <p>Número de Segurados</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="{{ url('admin/segurados/index')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-red">
              <div class="inner">
                <h4><strong>{{ $prospecao->count('prospecaos')}}</strong></h4>

                <p>Número de Contratos</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="{{ url('admin/contrato/index')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-aqua">
              <div class="inner">
                <h4><strong>{{ $prospecao->count('prospecaos')}}</strong></h4>

                <p>Aniversários</p>
              </div>
              <div class="icon">
                <i class="ion ion-birthday-cake"></i>
              </div>
              <a href="#" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
</div>

<div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Browser Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChart" height="160" width="244" style="width: 244px; height: 160px;"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">United States of America
                  <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                </li>
                <li><a href="#">China
                  <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
              </ul>
            </div>
            <!-- /.footer -->
          </div>
@stop