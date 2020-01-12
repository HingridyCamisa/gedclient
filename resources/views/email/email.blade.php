@extends('adminlte::page')

@section('title', 'SMS')

@section('content_header')
<h1><a class="btn btn-social-icon btn-github"  href="{{ url()->previous() }}"><i class="fa fa-fw fa-arrow-left"></i></h1></a>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=number], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    margin-top: 20px;
}

.textcenter{
    text-align: center;
}

</style>  
 
@stop

@section('content')
@include('notification')

          <div class="box box-solid box-danger">
          <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-envelope"></i> Enviar Email </strong></h3></center>
         </div>
 


<div class="box-body">
            <form action="{{ url('admin/enviaremail') }}" method="post">
                    {{ csrf_field() }}

            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}" />

            <label for="lname"><i class="fa fa-info"></i> Assunto:</label>
            <input type="text" id="assunto" name="assunto" placeholder="Assunto do Email">

            <label for="lname"><i class="fa fa-user"></i> Para:</label>
            <input type="text" id="name_cliente" name="name_cliente" placeholder="Nome" value="{{$nome_cliente }}">

            <label for="lname"><i class="fa fa-envelope"></i> Email:</label>
            <input type="text" id="to" name="to" value="{{$email_cliente }}">
            
            <label for="subject"><i class="fa fa-envelope"></i> Messagem:</label>
            <textarea id="message" class="textarea" name="message" placeholder="Escreva aqui o seu email..." value="{{ old('subject') }}" style="height:200px;height: 100px;"></textarea>

            <center><button type="submit" class="btn btn-danger"><i class="fa fa-send"></i> Enviar</button></center>
        </form>
</div>

<script>
        $('.textarea').ckeditor();
</script>
@stop