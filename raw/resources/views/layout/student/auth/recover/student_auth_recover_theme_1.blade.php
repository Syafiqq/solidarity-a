@extends('layout.bootstrap-authentication')
<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
?>
@section('head-title')
    <title>Recover</title>
@endsection

@section('head-description')
    <meta name="description" content="Recover">
@endsection

@section('body-content')
    @parent
    <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('root')}}">
                    <span style="color: #ff9800!important;">Truthfulness</span>
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menubuilder">
                <ul style="font-family: Viga,serif;" class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('root')}}">Kembali Ke Beranda</a>
                    </li>
                    <li>
                        <a href="{{route('counselor.auth.login.get')}}">Masuk Akun Konselor</a>
                    </li>
                    <li>
                        <a href="{{route('student.auth.login.get')}}">Masuk Akun Siswa</a>
                    </li>
                    <li>
                        <a href="{{route('counselor.auth.register.create')}}">Daftar Akun Konselor</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="registrationform">
                {!! $form->open(['route' => ['student.auth.recover.patch', "credential={$user->getAttribute('credential')}", "token={$user->getAttribute('lost_password')}"], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend style="font-family: Yatra One,serif; color: #ff9800!important;">Form Perubahan Password
                        <i class="fa fa-pencil pull-right"></i>
                    </legend>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-3 control-label">
                            Kata Sandi
                        </label>
                        <div class="col-lg-9">
                            {!! $form->password('password', ['placeholder' => 'Kata Sandi', 'required'=> true, 'class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-3 control-label">
                            Ketik Ulang Kata Sandi
                        </label>
                        <div class="col-lg-9">
                            {!! $form->password('password_confirmation', ['placeholder' => 'Ketik Ulang Kata Sandi', 'required'=> true, 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! $form->button('Ubah Password', ['type' => 'Submit', 'class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </fieldset>
                {!! $form->close() !!}
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center">
            <div id="banner">
                <h5></h5>
            </div>
        </div>
    </div>
@endsection

@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/student/auth/register/student_auth_register_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/student/auth/register/student_auth_register_theme_1.min.js')}}"></script>
@endsection
