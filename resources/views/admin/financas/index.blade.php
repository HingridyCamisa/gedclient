@extends('adminlte::page')

@section('title','Prospecções')

@section('content_header')
@stop

@section('content')
@include('notification')
 <div class="box box-solid box-danger">
   <div class="box-header">
              <center><h3 class="box-title"><strong><i class="fa fa-fw fa-folder-open"></i> Avisos </strong></h3></center>

    
     </div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data fim do Aviso </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Espirado? </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Nº do Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Estado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Tipo de Contrato</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de atualização</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de criação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
        </tr>
      </thead>
      <tbody>
      @foreach($avisos as $i => $aviso)
        <tr>
          <th><center><a href="{{ route ('clientes.show',$aviso->cliente)}}">{{ $aviso->cliente_nome }}</a></center></th>
          <th><center>{{ $aviso->cliente_email }}</center></th>
          <th><center>{{ $aviso->aviso_data}}</center></th>
          <th><center>
                 @if(($data=\Carbon\Carbon::parse($aviso->aviso_data))->isPast())
                    <i class="fa fa-close text-red"></i> Expirado  {{$data->diffForHumans()}}
                 @else
                    <i class="fa fa-check text-green"></i> Em dia  {{$data->diffForHumans()}}
                 @endif
           </center></th>
          <th><center>
              @if($aviso->tipo=='contratos')
              <a href="{{url('admin/contrato/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
              @else
               <a href="{{url('admin/saude/index')}}"> {{str_pad( $aviso->id, 6, "0", STR_PAD_LEFT)}}</a>
             @endif
          </center></th>
          <th><center>
                 @if($aviso->tipo=='saudes')
                    <span class="label bg-green">Saude</span>
                 @else
                    <span class="label  bg-blue">Contrato</span> 
                 @endif
          </center></th>
          <th><center>
              @if($aviso->status==1)
              <span class="label label-danger">Não pago</span> 
              @elseif($aviso->status==2)
              <span class="label label-warning">Pago</span> 
              @endif
              </center></th>
          <th><center> {{number_format($aviso->aviso_amount , 2, ',', ' ') }}</center></th>
          <th><center>{{ $aviso->updated_at }}</center></th>
          <th><center>{{ $aviso->created_at }}</center></th>

           <td><center>

             <a href="{{ route ('prospecoes.show', $aviso->id)}}" id="tornarcontrato"  value ="{{ $aviso->id }}" class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw fa-money"></i></a>
             @if(Auth::user()->cargo =='1')
              {!! Form::open(['method' => 'DELETE','url' => ['admin/financas/destroy', $aviso->id],'style'=>'display:inline']) !!}
              {!! Form::button('<i class="fa fa-trash-o"></i>', ['class'=>'btn btn-danger btn-xs', 'type'=>'submit']) !!}
              {!! Form::close() !!}
              @endif
            </center>
             </td>


      @endforeach
      </tr>
      </tbody>
      <tfoot>
        <tr class="table-danger">
          <th scope="col"><center><i class="fa fa-fw fa-user"></i> Cliente</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-users"></i>  Email</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Data fim do Aviso </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i>  Espirado? </center> </th>
          <th scope="col"><center><i class="fa fa-fw fa-warning"></i> Nº do Aviso </center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Estado</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Tipo de Contrato</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-money"></i> Valor</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de atualização</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-calendar"></i> Data de criação</center></th>
          <th scope="col"><center><i class="fa fa-fw fa-gears"></i> Acções</center></th>
          </tr>
      </tfoot>
    </table>
   </div>


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
                   <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                
                     <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label">Número</label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                          <input class="form-control" id="" placeholder="Nº de Apólice" type="text" name="numero_apolice" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-file-text"></i></span>
                          <input class="form-control" id="" placeholder="Nº de Recibo" type="text" name="numero_recibo" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>
    
                      <p><div class="col-md-7"></div><label for="" class="col-md-2 control-label"> Expira </label></p><br />
                     <p> 

                        <div class="form-group">
                        <label for="" class="col-md-2 control-label">Início </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="" type="date" name="data_inicio" required autofocus ></div>
                        </div>

                    
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id=""  type="date" name="data_proximo_pagamento" required autofocus ></div>
                        </div>
                        </div>

                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label"> Dias </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="" placeholder="Cobertos" type="text" name="dias_cobertos" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                          <input class="form-control" id="" placeholder="Próximo Pagamento" type="text" name="dias_proximo_pagamento" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label"> Capital Seguro</label>
                        <div class="col-md-10">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="" placeholder="Capital Seguro" type="text" name="capital_seguro" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label">  Prémio </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="" placeholder="Total" type="text" name="premio_total" required autofocus ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-money"></i></span>
                          <input class="form-control" id="" placeholder="Simples" type="text" name="premio_simples" required autofocus ></div>
                        </div>
                      </div>
                    </p> <br><br>

                     <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label"> Corretagem </label>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon">%</span>
                          <input class="form-control" id="" placeholder="Taxa" type="text" name="taxa_corretagem"  ></div>
                        </div>
                        <div class="col-md-5">
                          <div class="input-group">
                          <span class="input-group-addon">MTN</span>
                          <input class="form-control" id="" placeholder="Comissão" type="text" name="comissao"  ></div>
                        </div>
                      </div>
                    </p> <br><br>

                      <p> 
                        <label for="" class="col-md-2 control-label">Periodicidade Pagamento</label>
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
                        <label for="" class="col-md-2 control-label">Situação da Apólice</label>
                        <div class="col-md-10">
                        <select class="form-control" name="situacao" required autofocus >
                           <option value="Pago">Pago</option>
                           <option value="Em Cobrança">Em Cobrança</option>
                        </select>
                      </div>
                    </p> <br><br>
                    <p> <div class="form-group">
                        <label for="" class="col-md-2 control-label">Item Segurado</label>
                        <div class="col-md-10">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-fw fa-info-circle"></i></span>
                          <input class="form-control" id="" placeholder="Item Segurado" type="text" name="item_segurado"  ></div>
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
</div>


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        "order": [[ 0, "asc" ]],
        "columnDefs": [
                        { "type": "date-eu", "targets": 6 }
                      ],
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


 {{ $avisos->links() }}

@stop
