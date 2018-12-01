@extends('root.root-bootstrap')

@section('head-css-pre')
    @parent
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="{{asset('/assets/vendor/ionicons/dist/css/ionicons.min.css')}}">
    {{-- NProgress --}}
    <link rel="stylesheet" href="{{asset('/assets/vendor/nprogress/nprogress.min.css')}}">
    {{-- Adminlte --}}
    <link rel="stylesheet" href="{{asset('/assets/vendor/admin-lte/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/admin-lte/dist/css/skins/skin-blue.min.css')}}">
@endsection

@section('body-js-lower-pre')
    @parent
    {{-- SlimScroll --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    {{-- FastClick --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/fastclick/lib/fastclick.min.js')}}"></script>
    {{-- NProgress --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/nprogress/nprogress.min.js')}}"></script>
    {{-- Notify --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    {{-- Adminlte --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/admin-lte/dist/js/adminlte.min.js')}}"></script>
@endsection
