@extends('adminlte::page')

@section('title', 'SMS')

@section('content_header')
<h1><a class="btn btn-primary"  href="{{ url('admin/contrato/index')}}"><i class="fa fa-fw fa-arrow-left"></i> Voltar</h1></a>
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

          <div class="box box-solid box-success">
          <div class="box-header with-border">
                 <center><h3 class="box-title"><strong><i class="fa fa-envelope"></i> Enviar SMS </strong></h3></center>
         </div>

<div >  
        <!-- Mensagens-->
    <!-- Mensagens-->
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible textcenter" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible textcenter" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger textcenter">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- /Mensagens-->

    <!-- /Mensagens-->
</div>



<div class="box-body">
            <form action="{{ url('/enviarsms') }}" method="post">
                    {{ csrf_field() }}
                    
            <label for="fname"><i class="fa fa-institution"></i> De:</label>

            <input type="text" id="fname" name="fname" placeholder="Almond Brokers Correctores e Consultores de Seguro" value="{{ old('fname') }}">

            <label for="lname"><i class="fa fa-user"></i> Para:</label>
            <input type="text" id="lname" name="dname" placeholder="Nome" value="{{ old('dname') }}">

            <label for="lname"><i class="fa fa-phone-square"></i> Contacto:</label>
            <input type="text" id="lname" name="pnumber" value="{{ old('pnumber') }}">
            
            <label for="subject"><i class="fa fa-envelope"></i> Messagem:</label>
            <textarea id="subject" name="subject" placeholder="Write something.." alue="{{ old('subject') }}" style="height:200px;height: 100px;"></textarea>

            <center><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enviar</button></center>
        </form>
</div>



@stop