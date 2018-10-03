@extends('adminlte::page')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"></script> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap.min.css">
@section('title','Tabela Prospecções')

@section('content_header')
    <h1><a class="btn btn-success"  href="{{ url('admin/prospecoes') }}"><i class="fa fa-fw fa-plus"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-pdf-o"></i> </a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-file-excel-o"></i></a>
    <a class="btn btn-success"  href="#"><i class="fa fa-fw fa-print"></i></a></h1>
@stop

@section('content')
 <div class="box box-solid box-success">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-briefcase"></i> Prospecções </strong></h3></center>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input name="table_search" class="form-control pull-right" id="table_search" placeholder="Search" type="text">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div> 
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-success">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Início</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Prevista Fim</center></th>
          <th scope="col"><center></i>Ramo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-check-square"></i> Tornar Contrato </center></th>
          
        </tr>
      </thead>
      <tbody>
      @foreach($prospecaos as $prospecao)
        <tr>
          <th><center>{{ ++$i }}</center></th>
          <td>{{$prospecao->nome_cliente }}</td>
          <td>{{$prospecao->nome_consultor }}</td>  
          <td>{{ Carbon\Carbon::parse($prospecao->data_inicio)->format('d-m-Y ') }}</td>
          <td>{{ Carbon\Carbon::parse($prospecao->data_prevista_fim)->format('d-m-Y ') }}</td>
          <td>{{$prospecao->tipo_prospecao }}</td>
           @if(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->isPast())          
            <td><center><i class="fa fa-close text-red"></i> Expirada</center></td>
          @else
            <td><center><i class="fa fa-check text-green"></i> Em dia</center></td>
           @endif
            <td><center><a href="{{ route ('prospecoes.edit', $prospecao->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a> 
             
             <a href="{{ route ('prospecoes.show', $prospecao->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>       
             @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['prospecoes.destroy', $prospecao->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
            </center>
             </td>
             <td><center><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-default">
                Contrato
              </button> </center></td>
             <!-- <a href="{{ route ('prospecoes.show', $prospecao->id)}}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-folder"></i>Contrato</a> -->
      @endforeach
         
      </tr>
      </tbody>
      <tfoot>
        <tr>
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Início</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Prevista Fim</center></th>
          <th scope="col"><center></i>Ramo </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Situação </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-info-circle"></i> Detalhes </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-check-square"></i> Tornar Contrato </center></th>
          
        </tr>
      
      </tfoot>
    </table>
   </div>
   <!-- {{ $prospecaos->links()}} -->
  
   <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header  btn-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <!-- <h4 class="modal-title"><i class="fa fa-fw fa-folder"></i>Tornar Contrato</h4> -->
               <center> <h4 class="modal-title"><i class="glyphicon glyphicon-folder-open"></i> &nbsp; Contrato </h4> </center>
              </div>
              <div class="modal-body row">  
              
                <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Seguradora</label>
                    <div class="col-md-10">
                      <select class="form-control" name="nome_seguradora">
                        @foreach($seguradora as $segu)
                        <option>{{ $segu->nome_seguradora}}</option>
                        @endforeach
                      </select>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Número</label>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Nº de Apólice" type="text"></div>
                    </div>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Nº de Recibo" type="text"></div>
                    </div>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Início </label>
                    <div class="col-md-4">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      <input class="form-control" id="inputEmail3" type="date"></div>
                    </div>

                    <label for="inputEmail3" class="col-md-2 control-label"> Expira </label>
                    <div class="col-md-4">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      <input class="form-control" id="inputEmail3"  type="date"></div>
                    </div>
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label"> Dias </label>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Cobertos" type="text"></div>
                    </div>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Próximo Pagamento" type="text"></div>
                    </div>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label"> Capital Seguro</label>
                    <div class="col-md-10">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Capital Seguro" type="text"></div>
                    </div>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">  Prémio </label>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Total" type="text"></div>
                    </div>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Simples" type="text"></div>
                    </div>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label"> Corretagem </label>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input class="form-control" id="inputEmail3" placeholder="Taxa" type="text"></div>
                    </div>
                    <div class="col-md-5">
                      <div class="input-group">
                      <span class="input-group-addon">MTN</span>
                      <input class="form-control" id="inputEmail3" placeholder="Comissão" type="text"></div>
                    </div>
                  </div> 
                </p> <br><br>

                  <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Periodicidade Pagamento</label>
                    <div class="col-md-10">
                    <select class="form-control" name="periodicidade_pagamento">
                                    <option>Mensal</option>
                                    <option>Trimestral</option>
                                    <option>Semestral</option>
                                    <option>Anual</option>
                                    <option>Não Renovável </option>
                                </select>
                  </div> 
                </p> <br><br>

                 <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Situação da Apólice</label>
                    <div class="col-md-10">
                    <select class="form-control" name="situacao">
                       <option>Pago</option>
                       <option>Em Cobrança</option>         
                    </select>
                  </div> 
                </p> <br><br>
               
                <p> <div class="form-group">
                    <label for="inputEmail3" class="col-md-2 control-label">Item Segurado</label>
                    <div class="col-md-4">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-fw fa-info-circle"></i></span>
                      <input class="form-control" id="inputEmail3" placeholder="Item Segurado" type="text"></div>
                    </div>

                    <label for="inputEmail3" class="col-md-2 control-label">Upload Apólice</label>
                    <div class="col-md-4">
                      <div class="input-group">
                      <input id="exampleInputFile" type="file">
                     </div>
                    </div>
                  </div> 
                </p> <br><br>   
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submeter</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
   
 </div> 

 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src"https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src"https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src"https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script> 

<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );

</script> 





@stop
