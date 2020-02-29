@extends('adminlte::page')

@section('title', 'SGCCS')

@section('content_header')
    <h1><strong>Amana Corretores e Consultores de Seguros, S.A </strong></h1>
@stop

@section('content')
<div class="row">

     <div class="col-md-3">

        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="ion ion-cash"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Valor em Carteira</span>
            <span class="info-box-number">{{ number_format($contrato->sum('premio_total'), 2, ',', '.') . 'MTN'}}</span>
            <!-- The progress section is optional -->
            <div class="progress">
              <div class="progress-bar" style="width: {{100}}%"></div>
            </div>
            <span class="progress-description">
              Percentual {{ 100 }}% 
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>

     </div>

      <div class="col-md-3">

        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="ion ion-cash"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Valor das Comissões</span>
            <span class="info-box-number">{{number_format($contrato->sum('comissao'), 2, ',', '.') . 'MTN'}}</span>
            <!-- The progress section is optional -->
            <div class="progress">
              @if($contrato->sum('comissao')!=0)
              <div class="progress-bar" style="width: {{($contrato->sum('comissao')/$contrato->sum('premio_total'))*100}}%"></div>
              @endif
            </div>
            <span class="progress-description">
              @if($contrato->sum('comissao')!=0)
              Percentual {{ number_format(($contrato->sum('comissao')/$contrato->sum('premio_simples'))*100, 2) }}% 
              @endif
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>

      </div>


  <div class="col-md-3">
    <div class="small-box bg-yellow">
              <div class="inner">
                <h4><strong>{{ $prospecao->count('prospecao')}}</strong></h4>

                <p>Número de Prospecoes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/prospecoes/index')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-red">
              <div class="inner">
                <h4><strong>{{ $contrato->count('contrato')}}</strong></h4>

                <p>Número de Contratos</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="{{ url('admin/contrato/index')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
    <div class="small-box bg-red">
              <div class="inner">
                <h4><strong>{{  $contrato_expira }}</strong></h4>
                <p>Contratos a expirar</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="{{ url('admin/contrato/expira')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-red">
              <div class="inner">
                <h4><strong>{{  $saude_expira }}</strong></h4>
                <p>Saude a expirar</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a href="{{ url('admin/saude/expira')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-aqua">
              <div class="inner">
                <h4><strong>{{  $totalcontrato_expira_next }}</strong></h4>
                <p>A Expirar next month</p>
              </div>
              <div class="icon">
                <i class="ion ion-clock"></i>
              </div>
              <a data-toggle="modal" data-target="#modal-warning" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
    <div class="col-md-3">
    <div class="small-box bg-aqua">
              <div class="inner">
                <h4><strong>{{  $nu_aniversarios }}</strong></h4>
                <p>Aniversários</p>
              </div>
              <div class="icon">
                <i class="ion ion-beer"></i>
              </div>
              <a href="{{ url('admin/aniversarios/index')}}" class="small-box-footer">Detalhes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
</div>

<hr>

<div id="app"> 
        <div class="row">
      
        <div class="col-md-12">
        <div class="card">

                <div class="panel-body">
                    <div>
                    {!! $category_month->container()!!}
                    </div>  
                </div>
            </div>
        </div> 
         </div>
        <hr />
    <div class="row">
        <div class="col-md-4">
            <div class="card">

                <div class="panel-body">
                  <div>
                    {!! $chart->container()!!}
                 
                  </div>  
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card">

                          <div class="panel-body">
                                    <div>
                                      {!! $emidio->container()!!}
                                  
                                    </div>  
                          </div>
                </div>
        </div>
        <div class="col-md-4">
                <div class="card">

                          <div class="panel-body">
                                    <div>
                                      {!! $graf_seguradora->container()!!}
                                  
                                    </div>  
                          </div>
                </div>
        </div>

    </div>
</div>

<div class="modal modal-warning fade" id="modal-warning" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Aviso</h4>
              </div>
              <div class="modal-body">
                <p>Devera navegar para <code> Contratos->A Expirar</code> ou <code> Saude->A Expirar</code></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>


    <!--Graficos-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.1.0/dist/frappe-charts.min.iife.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.6.7/c3.min.js"></script>



<script src="https://unpkg.com/vue"></script>
<script>
    var app = new Vue({
        el: '#app',

    });


</script>
 

{!! $chart->script() !!}
{!! $emidio->script() !!}
{!! $graf_seguradora->script() !!}
{!! $category_month->script() !!}


<style>
.card-text{
      color: #DDC728;
      font-size: 3rem;
      font-family: "bitter",Georgia,serif;
}


</style>    


          
@stop