@extends('adminlte::page')

@section('title', 'Adicionar Cliente')

@section('content_header')

    <h1><a class="btn btn-social-icon btn-github"  href="{{ url('admin/clientes')}}"><i class="fa fa-fw fa-arrow-left"></i></a></h1>
    
   
@stop

@section('content')
@include('notification')


          <!-- general form elements -->
          <div class="box box-solid box-danger">
                        <div class="box-header with-border">
                        <center><h3 class="box-title"><strong><i class="fa fa-folder-open"></i> Editar Cliente: {{$cliente->cliente_nome}}</strong></h3></center>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{ url('admin/clientes/atualizar', $cliente->id)}}" enctype="multipart/form-data">
                            @csrf
                        <div class="box-body">
                             <div class="row">
                                <div class="col-xs-4">
                                    <label for="NomeSegurado"><i class="fa fa-user"></i> Cliente Nome</label>
                                    <input class="form-control" name="cliente_nome" placeholder="Nome" type="text" value="{{old('cliente_nome',$cliente->cliente_nome)}}">
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-institution"></i> Cliente Endereço</label>
                                    <input class="form-control" name="cliente_endereco" placeholder="Av. Josina Machel" type="text"  value="{{old('cliente_endereco',$cliente->cliente_endereco)}}">
                                </div>
                                <div class="col-xs-4">
                                    <label><i class="fa fa-user"></i> Tipo de Segurado</label>
                                        <select class="form-control" name="cliente_tipo" id="cliente_tipo" onchange="tipocliente(this.value)">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Individual">Individual</option>
                                            <option value="Empresa">Empresa</option>
                                        </select>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-xs-2">
                                    <label for="cliente_data_nascimento"><i class="fa fa-birthday-cake"></i> Cliente Data de Nascimento</label>
                                    <input  class="form-control desabilitar_empresa" name="cliente_data_nascimento"  type="date" value="{{old('cliente_data_nascimento',$cliente->cliente_data_nascimento)}}">
                                </div>
                                
                                 <div  class="col-xs-2">
                                    <label for="cliente_genero"><i class="fa fa-venus-mars"></i> Cliente Género</label>
                                    <div class="form-radio">
                                        <label class="radio-inline">
                                            <input class="desabilitar_empresa" type="radio" name="cliente_genero" value="Femenino">Femenino
                                        </label>
                                        <label class="radio-inline">
                                            <input class="desabilitar_empresa" type="radio" name="cliente_genero" value="Masculino">Masculino
                                    </label>
                                </div>   
                             </div>
                                <div class="col-xs-4">
                                    <label for="cliente_email"><i class="fa fa-envelope"></i> Cliente email</label>
                                    <input class="form-control" name="cliente_email"  type="email" placeholder="email@amana.co.mz" value="{{old('cliente_email',$cliente->cliente_email)}}">
                                </div>
                                <div class="col-xs-2">
                                    <label for="cliente_telefone_1"><i class="fa fa-phone"></i> Cliente Telefone 1</label>
                                    <input class="form-control" name="cliente_telefone_1" placeholder="Numero de celular" type="text" value="{{old('cliente_telefone_1',$cliente->cliente_telefone_1)}}">
                                </div>
                                <div class="col-xs-2">
                                    <label for="cliente_telefone_2"><i class="fa fa-phone"></i> Cliente Telefone 2</label>
                                    <input class="form-control" name="cliente_telefone_2" placeholder="Numero de celular" type="text" value="{{old('cliente_telefone_2',$cliente->cliente_telefone_2)}}">
                                </div>
                            </div><br>

                            <div class="row">


                                 <div class="col-xs-3">
                                    <label> País</label>
                                        <select class="form-control"  id="country">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($countries as $key => $country)
                                                <option value="{{$country}}"> {{$country}}</option>
                                           @endforeach
                                            
                                        </select>
                                </div>
                                
                                <div class="col-xs-3">
                                    <label>Provincia</label>
                                        <select class="form-control" name="cliente_state_id" id="cliente_state_id" >
                                        </select>
                                </div>
                                <div class="col-xs-4 desabilitar_empresa">
                                    <label>Cliente Documento de Identificação</label>
                                     <div class="input-group">
                                        <div class="input-group-btn " >
                                            <select class="btn btn-default dropdown-toggle" name="cliente_id_tipo" id="cliente_id_tipo" >
                                                <option  value="{{old('cliente_id_tipo',$cliente->cliente_id_tipo)}}" selected disabled> {{old('cliente_id_tipo',$cliente->cliente_id_tipo)}}</option>
                                                <option value="BI" >BI</option>
                                                <option value="Passaporte" >Passaporte</option>
                                                <option value="DIR" >DIR</option>
                                            </select>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" name="cliente_id_numero" value="{{old('cliente_id_numero',$cliente->cliente_id_numero)}}">
                                      </div>
                                </div>
                                
 
                                
                                </div><hr>


                     <!--pessoa de contacto-->
                           <div id="div_pessoa_contacto">
                             <div class="row">
                                <div class="col-xs-4">
                                    <label for="pessoa_contacto_nome"><i class="fa fa-user"></i> Pessoa de Contacto Nome</label>
                                    <input class="form-control" name="pessoa_contacto_nome" placeholder="Nome" type="text" value="{{old('pessoa_contacto_nome',$cliente->pessoa_contacto_nome)}}">
                                </div>
                                
                                 <div class="col-xs-4">
                                    <label><i class="fa fa-institution"></i> Pessoa de Contacto de  Endereço</label>
                                    <input class="form-control" name="pessoa_contacto_endereco" placeholder="Av. Josina Machel" type="text" value="{{old('pessoa_contacto_nome',$cliente->pessoa_contacto_nome)}}">
                                </div>
                                <div class="col-xs-4">
                                    <label for="pessoa_contacto_data_nascimento"><i class="fa fa-birthday-cake"></i> Pessoa de Contacto  Data de Nascimento</label>
                                    <input class="form-control" name="pessoa_contacto_data_nascimento"  type="date" value="{{old('pessoa_contacto_data_nascimento',$cliente->pessoa_contacto_data_nascimento)}}">
                                </div>

                            </div><br>

                            <div class="row">

                                
                                 <div class="col-xs-2">
                                    <label for="pessoa_contacto_genero"><i class="fa fa-venus-mars"></i> Pessoa de Contacto Género</label>
                                    <div class="form-radio">
                                        <label class="radio-inline">
                                            <input type="radio" name="pessoa_contacto_genero" value="Femenino" >Femenino
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="pessoa_contacto_genero" value="Masculino">Masculino
                                    </label>
                                </div>   
                             </div>
                                <div class="col-xs-4">
                                    <label for="pessoa_contacto_email"><i class="fa fa-envelope"></i> Pessoa de Contacto email</label>
                                    <input class="form-control" name="pessoa_contacto_email"  type="email" placeholder="email@amana.co.mz" value="{{old('pessoa_contacto_email',$cliente->pessoa_contacto_email)}}" >
                                </div>
                                <div class="col-xs-2">
                                    <label for="pessoa_contacto_telefone_1"><i class="fa fa-phone"></i> Pessoa de Contacto Telefone 1</label>
                                    <input class="form-control" name="pessoa_contacto_telefone_1" placeholder="Numero de celular" type="text" value="{{old('pessoa_contacto_telefone_1',$cliente->pessoa_contacto_telefone_1)}}">
                                </div>
                                <div class="col-xs-2">
                                    <label for="pessoa_contacto_telefone_2"><i class="fa fa-phone"></i> Pessoa de Contacto Telefone 2</label>
                                    <input class="form-control" name="pessoa_contacto_telefone_2" placeholder="Numero de celular" type="text" value="{{old('pessoa_contacto_telefone_2',$cliente->pessoa_contacto_telefone_2)}}">
                                </div>
                            </div><br>

                            <div class="row">


                                 <div class="col-xs-3">
                                    <label> País</label>
                                        <select class="form-control"  id="country_2">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($countries as $key => $country)
                                                <option value="{{$country}}"> {{$country}}</option>
                                           @endforeach
                                            
                                        </select>
                                </div>
                                
                                <div class="col-xs-3">
                                    <label>Provincia</label>
                                        <select class="form-control" name="pessoa_contacto_state_id" id="pessoa_contacto_state_id" >

                                        </select>
                                </div>
                                <div class="col-xs-4">
                                    <label>Pessoa de Contacto Documento de Identificação</label>
                                     <div class="input-group">
                                        <div class="input-group-btn " >
                                            <select class="btn btn-default dropdown-toggle" name="pessoa_contacto_id_tipo" id="pessoa_contacto_id_tipo" >
                                                <option value="{{old('pessoa_contacto_id_tipo',$cliente->pessoa_contacto_id_tipo)}}" selected disabled>{{old('pessoa_contacto_id_tipo',$cliente->pessoa_contacto_id_tipo)}}</option>
                                                <option value="BI" >BI</option>
                                                <option value="Passaporte" >Passaporte</option>
                                                <option value="DIR" >DIR</option>
                                            </select>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" name="pessoa_contacto_id_numero" value="{{old('pessoa_contacto_id_numero',$cliente->pessoa_contacto_id_numero)}}">
                                      </div>
                                </div>
                                
 
                                
                                </div>
                                
                                 <br>
                                
                           </div>   
                                <div class="form-group">
                                    <label for="DetalhesProspecao"><i class="fa fa-info"></i> Notas</label>
                                    <textarea class="form-control" name="notas" rows="2" placeholder="Notas ..." value="{{old('notas',$cliente->notas)}}"></textarea>
                                </div>
                           

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
                            

                        <!-- /.box-body -->
                        <div class="box-footer">
                                
                                <center><button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Submeter</button></center>
                            </div>
                           
                        </form>


                      
          </div>
          <!-- /.box --> 

<script>
    $(document).ready(function () {
        $data = $("#cliente_tipo").val();
        if ($data=='Individual') {
            $("#div_pessoa_contacto *").prop('disabled', true);
            $(".desabilitar_empresa *").removeAttr('disabled');
            $(".desabilitar_empresa").removeAttr('disabled');
        } else if($data=='Empresa') {
            $("#div_pessoa_contacto *").removeAttr('disabled');
            $(".desabilitar_empresa").prop('disabled', true);
            $(".desabilitar_empresa *").prop('disabled', true);
        }
    });

    function tipocliente(val) {
        if (val=='Individual') {
            $("#div_pessoa_contacto *").prop('disabled', true);
            $(".desabilitar_empresa *").removeAttr('disabled');
            $(".desabilitar_empresa").removeAttr('disabled');
        } else {
            $("#div_pessoa_contacto *").removeAttr('disabled');
            $(".desabilitar_empresa").prop('disabled', true);
            $(".desabilitar_empresa *").prop('disabled', true);
        }
        
    }
</script>

<script type="text/javascript">
    $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-state-list')}}?country_id="+countryID,
           success:function(res){               
               if (res) {
                $("#cliente_state_id").empty();
                $("#cliente_state_id").append('<option  value=""  selected disabled>Select</option>');
                $.each(res,function(key,value){
                    $("#cliente_state_id").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#cliente_state_id").empty();
            }
           }
        });
    }else{
        $("#cliente_state_id").empty();
       // $("#city").empty();
    }      
    });

</script>

<script type="text/javascript">
    $('#country_2').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('admin/get-state-list')}}?country_id="+countryID,
           success:function(res){               
               if (res) {
                $("#pessoa_contacto_state_id").empty();
                $("#cliente_stpessoa_contacto_state_idate_id").append('<option  value=""  selected disabled>Select</option>');
                $.each(res,function(key,value){
                    $("#pessoa_contacto_state_id").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#pessoa_contacto_state_id").empty();
            }
           }
        });
    }else{
        $("#pessoa_contacto_state_id").empty();
       // $("#city").empty();
    }      
    });

</script>
<script>
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
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