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
@stop