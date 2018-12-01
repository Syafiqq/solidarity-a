@extends('layout.counselor.extension.adminlte-sidebar')
<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($reports))
{
    $reports = \Illuminate\Database\Eloquent\Collection::make();
}
$now = \Carbon\Carbon::now();
?>
@section('head-title')
    <title>Report</title>
@endsection

@section('head-description')
    <meta name="description" content="Report">
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
                <li class="active">
                    <i class="fa fa-home"></i>
                    Report
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Report</h3>
                </div>
                <div class="box-body">
                    <table id="reports" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Sekolah</th>
                            <th>Jenis Kelamin</th>
                            <th>Pengisian</th>
                            <th>Perizinan</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(/** @var \App\Eloquent\User $user */$reports as $k => $user)
                            <?php
                            /** @var \App\Eloquent\UserStudents $student */
                            /** @noinspection PhpUndefinedVariableInspection */
                            $student = $user->getAttribute('student');
                            /** @var \App\Eloquent\Answer $answer */
                            $answer = $user->getAttribute('answer')->last();
                            ?>
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{$user->getAttribute('credential')}}</td>
                                <td>{{$user->getAttribute('name')}}</td>
                                <td>{{$student->getAttribute('grade')}}</td>
                                <td>{{$student->getAttribute('school')}}</td>
                                <td>{{$user->getGenderTranslation()}}</td>
                                @if(is_null($answer))
                                    <td>Belum Pernah</td>
                                @elseif(is_null($answer->getAttribute('finished_at')))
                                    <td>Sedang Mengerjakan</td>
                                @else
                                    <td>{{___d($answer->getAttribute('finished_at')->formatLocalized('%e %B %Y %H:%M'))}}</td>
                                @endif

                                @if(is_null($answer))
                                    <td>Memiliki Izin</td>
                                @elseif(is_null($answer->getAttribute('finished_at')))
                                    <td>Sedang Mengerjakan</td>
                                @elseif(intval($student->getAttribute('active')) === 1)
                                    <td>Memiliki Izin</td>
                                @elseif($answer->getAttribute('finished_at')->diffInDays($now) <= \App\Eloquent\Answer::$exerciseWindow)
                                    <td>
                                        {!! $form->open(['route' => ['counselor.student.activation', $user->getKey()], 'method' => 'patch']) !!}
                                        {!! $form->button('Aktifkan', ['type' => 'Submit']) !!}
                                        {!! $form->close() !!}
                                    </td>
                                @else
                                    <td>Memiliki Izin</td>
                                @endif

                                @if($user->isDetailReportValid())
                                    <td>{!! link_to_route('counselor.student.detail', $title = 'Detail', $parameters = [$user->getKey()], $attributes = []); !!}</td>
                                @else
                                    <td>Belum Ada Data</td>
                                @endif
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
    <link rel="stylesheet" href="{{asset('/assets/css/layout/counselor/report/list/counselor_report_list_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    @include('shard.datatable.datatable-js')
    <script type="text/javascript" src="{{asset('/assets/js/layout/counselor/report/list/counselor_report_list_theme_1.min.js')}}"></script>
@endsection
