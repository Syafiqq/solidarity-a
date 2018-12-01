<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong>
        There were some problems with your input.
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! $form->open(['route' => 'counselor.auth.register.store', 'method' => 'post']) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','name', 'Counselor-1', ['placeholder' => 'Nama', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','credential', '125150200111111', ['placeholder' => 'NIK/NIP', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->radio('gender', 'male', true, ['required' => true]); !!}Laki
{!! $form->radio('gender', 'female', null, ['required' => true]); !!}Perempuan
{!! nl2br(PHP_EOL) !!}
{!! $form->input('password','password', '12345678', ['placeholder' => 'Password', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('password','password_confirmation', '12345678', ['placeholder' => 'Ulangi Password', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','token', '', ['placeholder' => 'Kode Registrasi', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->button('Submit', ['type' => 'Submit']) !!}
{!! $form->close() !!}
</body>
</html>
