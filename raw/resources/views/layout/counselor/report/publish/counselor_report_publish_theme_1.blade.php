@extends('layout.counselor.extension.adminlte-sidebar')
<?php
/** @var \App\Eloquent\User $student */
/** @var \App\Eloquent\UserStudents $studentProfile */
/** @var \App\Eloquent\Answer $studentAnswer */
$counselorProfile = $user->counselor()->first();
$studentProfile = $student->student()->first();
$studentAnswer = $student->getAttribute('answer')->first();
$accumulation = $studentAnswer->answer_result()->sum('result');
$analytics = $studentAnswer->getResultAnalytics();
$now = \Carbon\Carbon::now();
?>
@section('head-title')
    <title>Cetak</title>
@endsection

@section('head-description')
    <meta name="description" content="Cetak">
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
                    <a href="{{route('counselor.report.list')}}">
                        <i class="fa fa-home"></i>
                        Report
                    </a>
                </li>
                <li>
                    <a href="{{route('counselor.student.detail', [$student->getKey()])}}">
                        <i class="fa fa-list"></i>
                        Detail
                    </a>
                </li>
                <li class="active">
                    <i class="fa fa-print"></i>
                    Print
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <page class="page" size="A4" id="printable-area">
                <div class="container" id="print_container">
                    <div class="row vertical-align">
                        <div class="col-sm-3">
                            <img src="{{asset('/assets/img/avatar/logo/logo.png')}}" alt="UM" class="img-rounded img-responsive center-block" style="width: 3.5cm; height: 3.5cm">
                        </div>
                        <div class="col-sm-9">
                            <p class="margin-bottom-2" id="header_department">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI</p>
                            <p class="margin-bottom-2" id="header_university">UNIVERSITAS NEGERI MALANG (UM)</p>
                            <p class="margin-bottom-2" id="header_faculty">FAKULTAS ILMU PENDIDIKAN</p>
                            <p class="margin-bottom-2" id="header_faculty">JURUSAN BIMBINGAN DAN KONSELING</p>
                            <p></p>
                            <p class="margin-bottom-2" id="header_u_address">Jalan Semarang 5 Malang 65145</p>
                            <p class="margin-bottom-2" id="header_u_desc">Telepon: 0341-566962, Laman: www.um.ac.id</p>
                        </div>
                    </div><!--/row-->
                    <div class="row vertical-align">
                        <div class="col-sm-12">
                            <hr class="bigHr">
                        </div>
                    </div>
                    <div class="row vertical-align">
                        <div class="col-sm-9"></div>
                        <div class="col-sm-3 text-center">
                            <div id="secret_container">
                                <p id="secret">RAHASIA</p>
                            </div>
                        </div>
                    </div>
                    <div class="row vertical-align">
                        <div class="col-sm-12 text-center">
                            <p id="content_welcome" class="margin-bottom-4" style="margin-top: 12px;font-weight: bold; font-size: 16px">LAPORAN INVENTORI
                                <i>SOLIDARITAS</i>
                                                                                                                                        SISWA SMA
                            </p>
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
                            <p class="font-size-12px margin-left-1-cm">Nama</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{$student->getAttribute('name')}}</p>
                        </div>
                        <div class="col-sm-2 text-left">
                            <p class="font-size-12px">Sekolah</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{$studentProfile->getAttribute('school')}}</p>
                        </div>
                    </div>
                    <div class="row vertical-align">
                        <div class="col-sm-1 ">
                        </div>
                        <div class="col-sm-2 text-left">
                            <p class="font-size-12px margin-left-1-cm">NIS</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{$student->getAttribute('credential')}}</p>
                        </div>
                        <div class="col-sm-2 text-left">
                            <p class="font-size-12px">Jenis Kelamin</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{$student->getGenderTranslation()}}</p>
                        </div>
                    </div>
                    <div class="row vertical-align">
                        <div class="col-sm-1 ">
                        </div>
                        <div class="col-sm-2 text-left">
                            <p class="font-size-12px margin-left-1-cm">Kelas</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{$studentProfile->getAttribute('grade')}}</p>
                        </div>
                        <div class="col-sm-2 text-left">
                            <p class="font-size-12px">Pengisian</p>
                        </div>
                        <div class="col-sm-3 no-padding-side">
                            <p class="font-size-12px">: {{___d($studentAnswer->getAttribute('finished_at')->formatLocalized('%e %B %Y'))}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-10 text-center">
                            <p id="content_welcome" style="font-weight: bold; font-size: 16px; margin: 8px">HASIL ANALISA</p>
                            <p class="font-size-12px" style="text-align: justify">Berdasarkan pengisian inventori
                                <i>Solidaritass</i>
                                <b>{{$student->getAttribute('name')}}</b>
                                                                                  memiliki tingkat solidaritas
                                <b>{{sprintf("%.4g%%", $accumulation)}}</b>
                                                                                  dan termasuk dalam klasifikasi
                                <b>{{array_values(array_filter($analytics, function($analytic) use ($accumulation){
                                    return (($accumulation > doubleval($analytic['guard']['min'])) && ($accumulation <= doubleval($analytic['guard']['max'])));
                                }))[0]['class']}}</b>
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 8px">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <table class="color-transparent custom-table">
                                <thead>
                                <tr>
                                    <th width="150" class="text-center font-size-14px">
                                        <b>Interval Persentase</b>
                                    </th>
                                    <th width="100" class="text-center font-size-14px">
                                        <b>Klasifikasi</b>
                                    </th>
                                    <th class="text-center font-size-14px">
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
                            <p class="text-left font-size-12px" style="margin-top: 12px">
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
                    <div class="row" style="margin-top: .5cm">
                        <div class="col-sm-8 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">Malang, {{___d($now->formatLocalized('%e %B %Y'))}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">Kepala Sekolah {{$counselorProfile->getAttribute('school')}}</p>
                        </div>
                        <div class="col-sm-3 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">Konselor</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1.2cm">
                        <div class="col-sm-1 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">{{$counselorProfile->getAttribute('school_head')}}</p>
                        </div>
                        <div class="col-sm-3 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">{{$user->getAttribute('name')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">{{$counselorProfile->getAttribute('school_head_credential')}}</p>
                        </div>
                        <div class="col-sm-3 ">
                        </div>
                        <div class="col-sm-4 no-padding-side">
                            <p class="font-size-12px margin-bottom-2">{{$user->getAttribute('credential')}}</p>
                        </div>
                    </div>
                </div>
            </page>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/counselor/report/publish/counselor_report_publish_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/vendor/jQuery.print/jQuery.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/layout/counselor/report/publish/counselor_report_publish_theme_1.min.js')}}"></script>
@endsection

@section('body-content-navbar')
    <?php
    $detailPage = route('counselor.student.detail', [$student->getKey()]);
    ?>
    @include('layout.counselor.extension.navbar.theme_1_navbar', ['pre_right_menu' => "<li><a href=\"$detailPage\"><i class=\"fa fa-arrow-left\"></i></a></li><li><a href=\"\" id=\"print\" ><i class=\"fa fa-print\"></i></a></li>"])
@endsection

