@extends('root.extension.adminlte-sidebar')
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


@section('body-content')
    @parent
    <div class="modal modal-success fade" id="music-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Pemutar Musik</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('shard.music-player.music-player-theme_1')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('head-css-pre')
    @parent
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('/assets/css/common/common-style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/shard/music-player/theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode($flashdata)!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/shard/music-player/theme_1.min.js')}}"></script>
@endsection

@section('body-property')
    <body class="hold-transition skin-green fixed sidebar-mini">
@endsection
