@extends('layout.student.extension.adminlte-sidebar')
<?php
/** @var \App\Eloquent\User $student */
/** @var \App\Eloquent\UserStudents $studentProfile */
/** @var \App\Eloquent\Answer $studentAnswer */
$studentProfile = $student->student()->first();
$studentAnswer = $student->getAttribute('answer')->first();
$accumulation = $studentAnswer->answer_result()->sum('result');
$analytics = $studentAnswer->getResultAnalytics();
$now = \Carbon\Carbon::now();
?>
@section('head-title')
    <title>Detail</title>
@endsection

@section('head-description')
    <meta name="description" content="Detail">
@endsection

@section('body-content')
    @parent
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('student.course.result')}}">
                        <i class="fa fa-home"></i>
                        Hasil
                    </a>
                </li>
                <li class="active">
                    <i class="fa fa-home"></i>
                    Detail
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row vertical-align">
                                <div class="col-sm-12 text-center">
                                    <div class="row vertical-align">
                                        <div class="col-sm-12 text-center">
                                            <p id="content_welcome" class="margin-bottom-4" style="margin-top: 12px;font-weight: bold; font-size: 16px">LAPORAN INVENTORI
                                                <i>TRUTHFULNESS</i>
                                                                                                                                                        SISWA SMA
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-1 ">
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p class="margin-left-1-cm">Nama</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getAttribute('name')}}</p>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p>Sekolah</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$studentProfile->getAttribute('school')}}</p>
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-1 ">
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p class="margin-left-1-cm">NIS</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getAttribute('credential')}}</p>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p>Jenis Kelamin</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getGenderTranslation()}}</p>
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-1 ">
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p class="margin-left-1-cm">Kelas</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$studentProfile->getAttribute('grade')}}</p>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <p>Pengisian</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{___d($studentAnswer->getAttribute('finished_at')->formatLocalized('%e %B %Y'))}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10 text-center">
                                    <p id="content_welcome" style="font-weight: bold; font-size: 16px; margin: 8px">HASIL ANALISA</p>
                                    <p style="text-align: justify">Berdasarkan pengisian inventori
                                        <i>Truthfulnesss</i>
                                        <b>{{$student->getAttribute('name')}}</b>
                                                                   memiliki tingkat kejujuran
                                        <b>{{sprintf("%.4g%%", $accumulation)}}</b>
                                                                   dan termasuk dalam klasifikasi
                                        <b>{{array_values(array_filter($analytics, function($analytic) use ($accumulation){
                                    return (($accumulation > doubleval($analytic['guard']['min'])) && ($accumulation <= doubleval($analytic['guard']['max'])));
                                }))[0]['class']}}</b>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th width="150" class="text-center ">
                                                <b>Interval Persentase</b>
                                            </th>
                                            <th width="150" class="text-center ">
                                                <b>Klasifikasi</b>
                                            </th>
                                            <th class="text-center ">
                                                <b>Interpretasi</b>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($analytics as $analytic)
                                            @if (($accumulation > doubleval($analytic['guard']['min'])) && ($accumulation <= doubleval($analytic['guard']['max'])))
                                                <tr>
                                                    <td class="font-size-12px text-center">
                                                        <strong>{!! $analytic['interval']!!}</strong>
                                                    </td>
                                                    <td class="font-size-12px text-center">
                                                        <strong>{!! $analytic['class']!!}</strong>
                                                    </td>
                                                    <td class="font-size-12px text-left">
                                                        <strong>{!! $analytic['description']['key']!!}</strong>
                                                        <br>
                                                        <strong>{!! $analytic['description']['value']!!}</strong>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <p class="text-left " style="margin-top: 12px">
                                        {!! sprintf(array_values(array_filter($analytics, function($analytic) use ($accumulation){
                                            return (($accumulation > doubleval($analytic['guard']['min'])) && ($accumulation <= doubleval($analytic['guard']['max'])));
                                        }))[0]['recommendation'],$student->getAttribute('name'))!!}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10 text-left">
                                    <p style="margin: 4px; font-size: 16px;">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

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
    <link rel="stylesheet" href="{{asset('/assets/css/layout/student/course/index/student_course_index_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/student/course/index/student_course_index_theme_1.min.js')}}"></script>
@endsection
