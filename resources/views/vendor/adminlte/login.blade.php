@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')

<br><br><br><br><br><br>

<!-- <div class="login-logo">
 <a href="#">{!! config('adminlte.logo_mini','<b>Admin</b>LTE')!!}</a>

</div> -->

<div class="panel-heading text-center">
<!-- <img src="{{ ('/img/imagem2.png')}}"   alt="logo" width="170" height="100"> -->


<div class="row" style="width:1400px; height:600px; margin: 0px 0 0 35%;">
        <div class="col-md-4">
        <img src="{{asset('/img/amana2.png')}}"   alt="logo" width="437" height="100">
          <div class="box box-solid box-danger">
            <div class="box-header with-border">
            <center><h3 class="box-title"><strong><i class="fa fa-sign-in"></i> Iniciar Sessão</strong></h3></center>
            </div>

             <form action="{{ url('login') }}" method="post">
                {!! csrf_field() !!}

            <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                 <!-- <label for="nome"><i class="fa fa-user"></i> Nome: </label> -->
                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('name') }}"
                                         placeholder="Nome do Usuario">
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                <!-- <label for="password"><i class="fa fa-lock"></i> Senha: </label> -->
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Senha do Usuario">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember"> Lembrar-me
                                </label>
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-6">
                            <button type="submit"
                                    class="btn btn-danger btn-block btn-flat"><i class="fa fa-sign-in"></i> Entrar</button>
                        </div>
                    
                </div>
            </form>
                
                
                <div class="auth-links">
                    <!-- <a href="{{ url(config('adminlte.password_reset_url', 'password/reset')) }}"
                    class="text-green">Esqueceu sua senha?</a> -->
                    <br>
                    <!-- @if (config('adminlte.register_url', 'register'))
                        <a href="{{ url(config('adminlte.register_url', 'register')) }}"
                        class="text-green" 
                        >Criar nova conta</a>
                    @endif -->
                    </div>
            </div>
            <!-- /.box-body -->
            <div class="footer text-muted">
   <center> <strong>Copyright © 2019 <a href="http://www.amanaseguros.co.mz/" class="text-white">Amana Softwares</a>.</strong> All rights
            reserved.</center>
	</div>
    </div>
     </div>
   
   

@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });

        
    </script>
    @yield('js')
@stop
