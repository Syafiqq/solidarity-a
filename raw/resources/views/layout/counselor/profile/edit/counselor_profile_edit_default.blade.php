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
    <title>Update</title>
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
{!! $form->model($counselor, ['route' => ['counselor.profile.update'], 'method' => 'patch']) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','school', null, ['placeholder' => 'Sekolah', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','school_head', null, ['placeholder' => 'Kepala Sekolah', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','school_head_credential', null, ['placeholder' => 'NIP Kepala Sekolah', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->button('Submit', ['type' => 'Submit']) !!}
{!! $form->close() !!}
</body>
</html>
