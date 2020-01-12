@extends('adminlte::page')
@section('title','Tabela Prospecções')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url('admin/prospecoes') }}"><i class="fa fa-fw fa-plus"></i></a></h1>
@stop

@section('content')

@include('notification')

 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-briefcase"></i> Prospecções </strong></h3></center>
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center> Nº</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Consultor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Início</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Prevista Fim</center></th>
          <th scope="col"><center> Ramo </center></th>
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
          <td>{{$prospecao->consultor }}</td>
          <td>{{ Carbon\Carbon::parse($prospecao->data_inicio)->format('d-m-Y ') }}</td>
          <td>{{ Carbon\Carbon::parse($prospecao->data_prevista_fim)->format('d-m-Y ') }}</td>
          <td>{{$prospecao->tipo_prospecao }}</td>
           @if(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->isPast())
            <td><center><i class="fa fa-close text-red"></i> Expirado {{\Carbon\Carbon::parse($prospecao->data_inicio)->addDays(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->diffInDays($prospecao->data_inicio))->diffForHumans()}} </center></td>
          @else
            <td><center><i class="fa fa-check text-green"></i> Em dia Expirado {{\Carbon\Carbon::parse($prospecao->data_inicio)->addDays(\Carbon\Carbon::parse($prospecao->data_prevista_fim)->diffInDays($prospecao->data_inicio))->diffForHumans()}}</center></td>
           @endif
            <td><center><a href="{{ route ('prospecoes.edit', $prospecao->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-pencil"></i></a>

             <a href="{{ route ('prospecoes.show', $prospecao->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-info-circle"></i></a>
             @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','route' => ['prospecoes.destroy', $prospecao->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
              <a href="{{ url('/sms') }}" class="btn btn-default btn-xs"><i class="fa fa-fw fa-envelope"></i></a>
            </center>
             </td>
             <td><center><button type="button" id="tornarcontrato"  value ="{{ $prospecao->id }}" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-default">
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
              <div class="modal-header  btn-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <!-- <h4 class="modal-title"><i class="fa fa-fw fa-folder"></i>Tornar Contrato</h4> -->
               <center> <h4 class="modal-title"><i class="glyphicon glyphicon-folder-open"></i> &nbsp; Contrato </h4> </center>
              </div>
              <form method="post" action="{{route('tornarcontrato')}}" enctype="multipart/form-data" >
              <div class="modal-body row">
              

                
                    @csrf
                    <input id="id" name="id_prospecaos" hidden>
                    <input name="id_user" hidden value="{{ Auth::user()->id }}">


                    <p> 
                        <label for="inputEmail3" class="col-md-2 control-label">Seguradora</label>
                        <div class="col-md-10">
                          <select class="form-control" name="nome_seguradora" required autofocus >
                            @foreach($seguradora as $segu)
                            <option value="{{$segu->id}}">{{ $segu->nome_seguradora}}</option>
                            @endforeach
                          </select>
                      </div>
                    </p> <br><br>
                
                     <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Número</label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Nº de Apólice" type="text" name="numero_apolice" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Nº de Recibo" type="text" name="numero_recibo" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>
    
                      <p><div class="col-md-7"></div><label for="inputEmail3" class="col-md-2 control-label"> Expira </label></p><br />
                     <p> 

                        <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Início </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="inputEmail3" type="date" name="data_inicio" required autofocus ></div>
                        </div>

                    
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="inputEmail3"  type="date" name="data_proximo_pagamento" required autofocus ></div>
                        </div>
                        </div>

                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label"> Dias </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Cobertos" type="text" name="dias_cobertos" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Próximo Pagamento" type="text" name="dias_proximo_pagamento" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label"> Capital Seguro</label>
                        <div class="col-md-10">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Capital Seguro" type="text" name="capital_seguro" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">  Prémio </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Total" type="text" name="premio_total" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Simples" type="text" name="premio_simples" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label"> Corretagem </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon">%</span>
                          <input class="form-control" id="inputEmail3" placeholder="Taxa" type="text" name="taxa_corretagem"  ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon">MTN</span>
                          <input class="form-control" id="inputEmail3" placeholder="Comissão" type="text" name="comissao"  ></div>
                        </div>
                      </div>
                    </p> <br><br>

                      <p> 
                        <label for="inputEmail3" class="col-md-2 control-label">Periodicidade Pagamento</label>
                        <div class="col-md-10">
                        <select class="form-control" name="periodicidade_pagamento" required autofocus ">
                                        <option value="Mensal">Mensal</option>
                                        <option value="Trimestral">Trimestral</option>
                                        <option value="Semestral">Semestral</option>
                                        <option value="Anual">Anual</option>
                                        <option value="Não~Renovável">Não Renovável </option>
                                    </select>
                      </div>
                    </p> <br><br>

                     <p> 
                        <label for="inputEmail3" class="col-md-2 control-label">Situação da Apólice</label>
                        <div class="col-md-10">
                        <select class="form-control" name="situacao" required autofocus >
                           <option value="Pago">Pago</option>
                           <option value="Em Cobrança">Em Cobrança</option>
                        </select>
                      </div>
                    </p> <br><br>
                    <p> <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Item Segurado</label>
                        <div class="col-md-4">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-info-circle"></i></span>
                          <input class="form-control" id="inputEmail3" placeholder="Item Segurado" type="text" name="item_segurado"  ></div>
                        </div>
                      </div>
                    </p> <br><br>
                    <!--files-->
                  <hr />
                    
                    
                   <div class="row col-md-12" style="margin-left:5px">   
                    <h4><i class="fa fa-upload"></i> Upload<a style="color: red">*</a></h4>  
                      <small id="fileHelp" class="form-text text-muted">Por favor carregue o anexo (jpeg,png,pdf) com os todos documentos. E não  superior à 5MB</small>
                      <div class="">
                        <select class="form-control"   id="filetype[]"  name="filetype[]" required autofocus  >
                           <option disabled selected>Seleciona tipo de ficheiro...</option>
                                    <option value="BI">
                                        BI
                                    </option>                                       
                                    <option value="Apolice de Seguro">
                                        Apolice de Seguro
                                    </option>                                    
                                    <option value="Carta de Condução">
                                        Carta de Condução
                                    </option>                                    
                                    <option value="Carta de Nomeação">
                                        Carta de Nomeação
                                    </option>                                    
                                    <option value="Livrete/Verbete">
                                        Livrete/Verbete
                                    </option>                                    
                                    <option value="Imagem">
                                        Imagem
                                    </option>                                    
                                    <option value="Formulario de Peritagem">
                                        Formulario de Peritagem
                                    </option>                                    
                                    <option value="Passaporte">
                                        Passaporte
                                    </option>                                    
                                    <option value="Comprovativo de pagamento">
                                        Comprovativpo de pagamento
                                    </option>                                   
                                    <option value="Factura">
                                        Factura
                                    </option>                                   
                                    <option value="Recibos">
                                        Recibos
                                    </option>                                    
                                    <option value="Alvará">
                                        Alvará
                                    </option>                                    
                                    <option value="Recibo de Água">
                                        Recibo de Água
                                    </option>                                    
                                    <option value="Certidão">
                                        Certidão
                                    </option>                                    
                                    <option value="Outros">
                                        Outros
                                    </option>
                        </select>
                      </div>
                    <div class="input-group control-group increment" >
                      <input type="file" name="file[]" class="form-control" >
                      <div class="input-group-btn" > 
                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus" ></i>Add</button>
                      </div>
          
                    </div>


                    <div class="clone hide" >
                    <div class="control-group">
                      <div class="" style="margin-top:10px">
                        <select class="form-control"   id="filetype[]"  name="filetype[]" required autofocus  >
                           <option disabled selected>Seleciona...</option>
                                    
                                    <option value="BI">
                                        BI
                                    </option>                                       
                                    <option value="Apolice de Seguro">
                                        Apolice de Seguro
                                    </option>                                    
                                    <option value="Carta de Condução">
                                        Carta de Condução
                                    </option>                                    
                                    <option value="Carta de Nomeação">
                                        Carta de Nomeação
                                    </option>                                    
                                    <option value="Livrete/Verbete">
                                        Livrete/Verbete
                                    </option>                                    
                                    <option value="Imagem">
                                        Imagem
                                    </option>                                    
                                    <option value="Formulario de Peritagem">
                                        Formulario de Peritagem
                                    </option>                                    
                                    <option value="Passaporte">
                                        Passaporte
                                    </option>                                    
                                    <option value="Comprovativo de pagamento">
                                        Comprovativo de pagamento
                                    </option>                                   
                                    <option value="Factura">
                                        Factura
                                    </option>                                   
                                    <option value="Recibos">
                                        Recibos
                                    </option>                                    
                                    <option value="Alvará">
                                        Alvará
                                    </option>                                    
                                    <option value="Recibo de Água">
                                        Recibo de Água
                                    </option>                                    
                                    <option value="Certidão">
                                        Certidão
                                    </option>                                    
                                    <option value="Outros">
                                        Outros
                                    </option>
                        </select>
                      </div>
                      <div class=" input-group" >
                        <input type="file" name="file[]" class="form-control" >          
                        <div class="input-group-btn"> 
                          <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remover</button>
                        </div>
                      </div>
                    </div>
                    </div>
                   </div>


                </div>
                   <!--and files-->
                     <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button>
                      </div>
                </form>
                 <!-- /.modal-content -->   

          </div>
          <!-- /.modal-dialog -->
   </div>





<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "columnDefs": [
    { "type": "date-eu", "targets": 4 }
  ],
        "order": [[ 4, "desc" ]],
        buttons: [
            {
              extend: 'copy',
              text: '<i class="fa fa-files-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'excel',
              text: '<i class="fa fa-file-excel-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'csv',
              text: '<i class="fa fa-file-text-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'pdf',
              text: '<i class="fa fa-file-pdf-o"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'print',
              text: '<i class="fa fa-fw fa-print"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
            {
              extend: 'colvis',
              text: '<i class="fa fa-fw fa-eye-slash"></i>',
              exportOptions: {
                columns: ':visible'

              }
            },
        ]
    } );
} );

</script>


<script>
  $(document).on('click', 'button[id="tornarcontrato"]', function(){
    $valu = $(this).val();
    // alert($valu);
    $('#id').val($valu);
    //alert($('#id').val());
  } );

 
</script>

<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

@stop
