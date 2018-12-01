@extends('root.root-boilerplate')

@section('bootstrap-style')
    <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css')}}">
@endsection

@section('bootstrap-script')
    <script type="text/javascript" src="{{asset('/assets/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
@endsection

@section('head-css-pre')
    @parent
    {{-- Bootstrap --}}
    @yield('bootstrap-style')
@endsection

@section('body-js-lower-pre')
    @parent
    {{-- Popper --}}
    <script type="text/javascript" src="{{asset('/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
    {{-- Bootstrap --}}
    @yield('bootstrap-script')
@endsection
