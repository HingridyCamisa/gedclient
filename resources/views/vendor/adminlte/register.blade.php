@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <style type="text/css">
        body{
            background-image: url(/home/hingridy/var/www/html/GestaoSegurados/resources/assets/Capture.PNG);
        }
    </style>
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
@if(Auth::user()->cargo =='1')
<div class="container">
<br><br><br><br><br><br><br><br>
<div class="panel-heading text-center">
</div>
<div class="row" style="width:1400px; height:750px; margin: 0px 0 0 250px;">
        <div class="col-md-6">
        <img src="{{ ('/img/amana2.png')}}"   alt="logo" width="670" height="100">
          <div class="box box-solid box-danger">
            <div class="box-header with-border">
            <center><h3 class="box-title"><strong><i class="fa fa-user"></i> Registar Usuário</strong></h3></center>
            </div>

            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}

            <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                            placeholder="Nome">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                 <div class="form-group has-feedback {{ $errors->has('apelido') ? 'has-error' : '' }}">
                                    <input type="text" name="apelido" class="form-control" value="{{ old('apelido') }}"
                                        placeholder="Apelido">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            @if ($errors->has('apelido'))
                                        <span class="help-block"><strong>{{ $errors->first('apelido') }}</strong></span>
                                             @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                     placeholder="Email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                     <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group has-feedback {{ $errors->has('contacto') ? 'has-error' : '' }}">
                                <input type="text" name="contacto" class="form-control" value="{{ old('contacto') }}"
                                    placeholder="Contacto">
                                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                @if ($errors->has('contacto'))
                                    <span class="help-block"><strong>{{ $errors->first('contacto') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                                <input type="text" name="endereco" class="form-control" value="{{ old('endereco') }}"
                                    placeholder="Endereco">
                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                @if ($errors->has('endereco'))
                                    <span class="help-block"> <strong>{{ $errors->first('endereco') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group has-feedback {{ $errors->has('cargo') ? 'has-error' : '' }}">
                                <!-- <input type="text" name="cargo" class="form-control" value="{{ old('cargo') }}"
                                    placeholder="Cargo"> -->
                                    <select name="cargo" id="cargo" class="form-control" value="{{ old('cargo') }}">
                                        <option value="">Seleciona o Cargo..</option>
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                @if ($errors->has('cargo'))
                                    <span class="help-block"> <strong>{{ $errors->first('cargo') }}</strong></span>
                                @endif
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirmar Password">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <center><button type="submit" class="btn btn-danger btn-block btn-flat"><i class="fa fa-plus"></i> Criar Conta</button></center>
                    </div>
            </form>
                    <div class="auth-links">
                     <center><a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-black">Voltar para o formulário de Inicio de Sessão </a></center>
                    </div>
                        

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->

     
    <div class="footer text-muted">
   <center> <strong>Copyright © 2019 <a href="http://www.amanaseguros.co.mz/" class="text-white">Amana Softwares</a>.</strong> All rights
            reserved.</center>
	</div>
</div>

</div>

@endif

@if(Auth::user()->cargo =='2')
 <h1> teste </h1>
@endif

@stop

@section('adminlte_js')
    @yield('js')
@stop
