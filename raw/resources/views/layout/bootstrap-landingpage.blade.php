@extends('root.root-bootstrap')
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

@section('bootstrap-style')
    <link rel="stylesheet" href="{{asset('/assets/baked/landingpage/lib/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/baked/landingpage/lib/bootstrap/css/bootstrap-theme.min.css')}}">
@endsection

@section('bootstrap-script')
    <script type="text/javascript" src="{{asset('/assets/baked/landingpage/lib/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection


@section('head-css-pre')
    @parent
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Kavoon" rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel='stylesheet'>
    <link href="/assets/baked/landingpage/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/baked/landingpage/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/baked/landingpage/lib/animate-css/animate.min.css" rel="stylesheet">
    <link href="/assets/baked/landingpage/css/style.min.css" rel="stylesheet">
@endsection

@section('body-content')
    @parent
    <div style="display: none">
        @include('shard.music-player.music-player-theme_1')
    </div>
@endsection

@section('body-js-lower-pre')
    @parent
    <script type="text/javascript" src="{{asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/fastclick/lib/fastclick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/nprogress/nprogress.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="/assets/baked/landingpage/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/baked/landingpage/lib/superfish/hoverIntent.min.js"></script>
    <script src="/assets/baked/landingpage/lib/superfish/superfish.min.js"></script>
    <script src="/assets/baked/landingpage/lib/morphext/morphext.min.js"></script>
    <script src="/assets/baked/landingpage/lib/wow/wow.min.js"></script>
    <script src="/assets/baked/landingpage/lib/stickyjs/sticky.min.js"></script>
    <script src="/assets/baked/landingpage/js/custom.min.js"></script>
    <script src="/assets/baked/landingpage/contactform/contactform.min.js"></script>
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode($flashdata)!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/shard/music-player/theme_1.min.js')}}"></script>
@endsection

@section('body-property')
    <body id="page-top">
@endsection
