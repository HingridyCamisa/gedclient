@extends('adminlte::page')

@section('title','Anexos')

@section('content_header')
    <h1><a class="btn btn-danger"  href="{{ url()->previous() }}"><i class="fa  fa-arrow-left"></i></a></h1>
@stop

@section('content')
@include('notification')

<div class="container">

        <div class="col-sm-12">
                <div class="row"></div>
                <div class="form-group">
                    <div class="box-body table-responsive no-padding">
                    <table class="table-responsive-sm table-condensed table  table-hover" cellspacing="0" width="100%" style="font-size:9">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo do Ficheiro</th>
                            <th>Nome do Ficheiro</th>
                            <th>Acção</th>
                        </tr>
                    </thead>
                            
                    <tbody>
                        @if(isset($files))
                            @foreach($files as $key=>$cil)
                            <tr>
                            <td>{{++$key}}</td>
                            <td>{{$cil->filetype}}</td>
                            <td><strong><a class="fa fa-file " aria-hidden="true" href="{{asset('storage/anexos/'.$cil->filename)}}" target="_self"> {{$cil->filename}}</a></strong>
                            </td>
                            <th><strong><a class="fa fa-trash " aria-hidden="true" href="{{route('remove-anexo',$cil->filename)}}" target="_self"> Remover</a></strong>
                            </th>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>

                </table>
                </div>
            </div>
        </div>
        <br>
      <form method="post" action="{{ url('admin/files/addfiles',$token_id) }}" enctype="multipart/form-data">
          {{csrf_field()}}
        <h4><i class="fa fa-upload"></i> Upload<a style="color: red">*</a></h4> 
          <small id="fileHelp" class="form-text text-muted">Por favor carregue o anexo (jpeg,png,pdf) com os todos documentos. E não pode ser superior à 10MB</small>
          <div class="">
            <select class="form-control"   id="filetype[]"  name="filetype[]" required autofocus>
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
          <div class=" input-group" >
            <input type="file" name="file[]" class="form-control" >          
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remover</button>
            </div>
          </div>
        </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submeter</button>

        </form>
                </div>
        </div> 



        
        
        
    </div>
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

<style type="text/css">
    .table{
        font-size: 10.7px;
    }
</style>

@stop
