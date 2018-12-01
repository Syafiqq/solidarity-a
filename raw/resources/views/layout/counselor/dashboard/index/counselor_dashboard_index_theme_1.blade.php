@extends('layout.counselor.extension.adminlte-sidebar')
@section('head-title')
    <title>Dashboard</title>
@endsection

@section('head-description')
    <meta name="description" content="Dashboard">
@endsection

@section('body-content')
    @parent
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Selamat Datang
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i>
                    Dashboard
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Dashboard</h3>
                </div>
                <div class="box-body">
                    <table id="coupons" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kupon</th>
                            <th>Pembuat</th>
                            <th>Peruntukan</th>
                            <th>Tanggal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(/** @var \App\Eloquent\User $user */$coupons as $k => $coupon)
                            <?php
                            /** @var \App\Eloquent\User $student */
                            /** @noinspection PhpUndefinedVariableInspection */
                            $user = $coupon->getAttribute('users');
                            ?>
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$coupon->getAttribute('coupon')}}</td>
                                <td>{{$user->getAttribute('name')}}</td>
                                <td>{{$coupon->getHumanReadableUsage()}}</td>
                                <td>{{___d($coupon->getAttribute('created_at')->formatLocalized('%e %B %Y %H:%M'))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <h1>&nbsp;</h1>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('head-css-post')
    @parent
    @include('shard.datatable.datatable-css')
    <link rel="stylesheet" href="{{asset('/assets/css/layout/counselor/dashboard/index/counselor_dashboard_index_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    @include('shard.datatable.datatable-js')
    <script type="text/javascript" src="{{asset('/assets/js/layout/counselor/dashboard/index/counselor_dashboard_index_theme_1.min.js')}}"></script>
@endsection
