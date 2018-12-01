@extends('root.root-boilerplate')
<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
/** @var \Illuminate\Session\Store $session */
$session = \Illuminate\Support\Facades\Session::getFacadeRoot();
$flashdata = ['notify' => []];
if (isset($errors))
{
    $flashdata['notify'] = array_merge($flashdata['notify'], $errors->all());
}
if (!is_null($session->get('cbk_msg')))
{
    $flashdata = array_merge($flashdata, $session->get('cbk_msg'));
}
?>

@section('head-css-pre')
    <link rel="stylesheet" href="{{asset('/assets/baked/authentication/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/baked/authentication/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/baked/authentication/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/common/common-style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/shard/music-player/theme_1.min.css')}}">
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800' rel='stylesheet' type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Knewave' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Titan+One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Baloo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Yatra+One' rel='stylesheet'>
@endsection

@section('body-content')
    @parent
    <div style="display: none">
        @include('shard.music-player.music-player-theme_1')
    </div>
@endsection

@section('body-js-lower-pre')
    @parent
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/default-backstretch.min.js')}}"></script>
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode($flashdata)!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/shard/music-player/theme_1.min.js')}}"></script>
@endsection
