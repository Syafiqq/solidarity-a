@extends('layout.counselor.extension.adminlte-sidebar')
<?php
/**
 * @var \App\Eloquent\User $report
 * @var \Collective\Html\FormBuilder $form
 * @var \Illuminate\Database\Eloquent\Collection $categories
 */
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($categories))
{
    $categories = \Illuminate\Database\Eloquent\Collection::make();
}
$student = $report->getAttribute('student');
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
                    <a href="{{route('counselor.report.list')}}">
                        <i class="fa fa-home"></i>
                        Report
                    </a>
                </li>
                <li class="active">
                    <i class="fa fa-list"></i>
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
                    <div class="col-sm-10 col-sm-offset-1">
                        <dl class="dl-horizontal">
                            <dt>NISN</dt>
                            <dd>{{$report->getAttribute('credential')}}</dd>
                            <dt>Name</dt>
                            <dd>{{$report->getAttribute('name')}}</dd>
                            <dt>Kelas</dt>
                            <dd>{{$student->getAttribute('grade')}}</dd>
                            <dt>Sekolah</dt>
                            <dd>{{$student->getAttribute('school')}}</dd>
                            <dt>Jenis Kelamin</dt>
                            <dd>{{$report->getGenderTranslation()}}</dd>
                        </dl>
                    </div>
                    <table id="details" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Mulai Pengisian</th>
                            <th>Pengisian Selesai</th>
                            @foreach (/** @var \App\Eloquent\QuestionCategory $category */$categories as $category)
                                <th>{{ $category->getAttribute('name') }}</th>
                            @endforeach
                            <th>Cetak</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(/** @var \App\Eloquent\Answer $answer */$report->getAttribute('answer') as $k => $answer)
                            <?php
                            /** @var \App\Eloquent\Answer $answer
                             * @var \Illuminate\Support\Collection $results
                             */
                            $isInProcess = is_null($answer->getAttribute('finished_at'));
                            $results = $answer->getAttribute('answer_result');
                            ?>
                            <tr>
                                <td>{{$k + 1}}</td>
                                <td>{{___d($answer->getAttribute('started_at')->formatLocalized('%e %B %Y %H:%M'))}}</td>
                                <td>{{___d($isInProcess ? 'Tahap Pengerjaan' : $answer->getAttribute('finished_at')->formatLocalized('%e %B %Y %H:%M'))}}</td>
                                @foreach (/** @var \App\Eloquent\QuestionCategory $category */$categories as $category)
                                    <?php
                                    /** @var \App\Eloquent\AnswerResult $result */
                                    $result = $results->filter(/** @param \App\Eloquent\AnswerResult $result */
                                        function ($result) use ($category) {
                                            return intval($result->getAttribute('category')) === $category->getKey();
                                        })->first();
                                    ?>
                                    <td>{{ $isInProcess ? '-' : (is_null($result) ? '-' : sprintf("%.4g%%", doubleval($result->getAttribute('result')))) }}</td>
                                @endforeach
                                <td>{!! $isInProcess ? '-' : link_to_route('counselor.student.publish', $title = 'Cetak', $parameters = [$report->getKey(), $answer->getKey()], $attributes = []); !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-10 col-sm-offset-1">
                        <dl class="dl-horizontal">
                            @foreach (/** @var \App\Eloquent\QuestionCategory $category */$categories as $category)
                                <dt>{{ $category->getAttribute('name') }}</dt>
                                <dd>{{ $category->getAttribute('description') }}</dd>
                            @endforeach
                        </dl>
                    </div>
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
    <link rel="stylesheet" href="{{asset('/assets/css/layout/counselor/report/detail/counselor_report_detail_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    @include('shard.datatable.datatable-js')
    <script type="text/javascript" src="{{asset('/assets/js/layout/counselor/report/detail/counselor_report_detail_theme_1.min.js')}}"></script>
@endsection
