@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<br><br><br><br><br><br><br><br><br>
<div class="panel-heading text-center">
</div>
<div class="row" style="width:1400px; height:500px; margin: 0px 0 0 560px;">
        <div class="col-md-4">
        <img src="{{ ('/img/imagem2.png')}}"   alt="logo" width="437" height="100">
          <div class="box box-solid box-success">
            <div class="box-header with-border">
            <center><h3 class="box-title"><strong><i class="fa fa-refresh"></i> Recuperar Senha</strong></h3></center>
            </div>

              <form action="{{ url(config('adminlte.password_email_url', 'password/email')) }}" method="post">
                {!! csrf_field() !!}

            <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $email or old('email') }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-success btn-block btn-flat">Enviar Link para Recuperar Senha</button>
                        </div> 
                    </div>
                    
                </div>
            </form>

            </div>
            <!-- /.box-body -->
            <div class="footer text-muted">
   <center> <strong>Copyright © 2018 <a href="#">Hingridy Camisa</a>.</strong> All rights
            reserved.</center>
	</div>
          </div>
          

</div>

@stop

@section('adminlte_js')
    @yield('js')
@stop
