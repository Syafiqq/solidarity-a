@extends('layout.student.extension.adminlte-sidebar')
<?php
/**
 * @var \Collective\Html\FormBuilder $form
 * @var \Illuminate\Database\Eloquent\Collection $options
 * @var \App\Eloquent\QuestionOption $option
 * @var \App\Eloquent\Question $question
 * @var \App\Eloquent\AnswerDetail $prev
 * @var \App\Eloquent\AnswerDetail $current
 * @var \App\Eloquent\AnswerDetail $next
 * @var \Illuminate\Database\Eloquent\Collection $summary
 * @var \App\Eloquent\AnswerDetail $answer_detail
 * */
$form = \Collective\Html\FormFacade::getFacadeRoot();
$isFinished = $summary->filter(function ($answer_detail) {
    return is_null($answer_detail->getAttribute('answer'));
})->count();
$summaryCount = $summary->count();
$answerWindow = 8;
$progress = round(($summaryCount - $isFinished) * 100.0 / $summaryCount, 1);
?>
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
                Selamat Mengerjakan
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
                {!! $form->model($current, ['route' => ['student.course.start.update', $current->getAttribute('order')], 'method' => 'patch']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Soal</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <h4>
                            <strong>{{$question->getAttribute('question')}}</strong>
                        </h4>
                        @foreach($options->reverse() as $option)
                            {!! $form->radio('answer', $option->getAttribute('id'))!!}
                            {{$option->getAttribute('description')}}
                            {!! nl2br(PHP_EOL) !!}
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-6 col-sm-offset-3 text-center centered">
                        <div class="btn-group" role=group aria-label="question-track">
                            @if(is_null($prev))
                                <a class="btn btn-danger"><< Sebelumnya</a>
                            @else
                                <?php
                                $isCompleted = is_null($prev->getAttribute('answer')) ? 'default' : 'info';
                                ?>
                                {!! link_to_route('student.course.start.edit', '<< Sebelumnya', [$prev->getAttribute('order')], ['class'=> "btn btn-$isCompleted"]); !!}
                            @endif
                            <?php
                            $isCompleted = is_null($current->getAttribute('answer')) ? 'default' : 'info';
                            ?>
                            {!! $form->button('Simpan', ['type' => 'submit','class' => "btn btn-$isCompleted"]) !!}
                            @if(is_null($next))
                                <a class="btn btn-danger">Selanjutnya >></a>
                            @else
                                <?php
                                $isCompleted = is_null($next->getAttribute('answer')) ? 'default' : 'info';
                                ?>
                                {!! link_to_route('student.course.start.edit', 'Selanjutnya >>', [$next->getAttribute('order')], ['class'=> "btn btn-$isCompleted"]); !!}
                            @endif
                        </div>
                    </div>
                </div>
            {!! $form->close() !!}
            <!-- /.box-footer-->
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Track Persoalan</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-6 col-sm-offset-3 text-center centered margin-top-8 margin-bottom-8">
                        <div class="btn-group" role=group aria-label="question-track">
                            @foreach($summary as $answer_detail)
                                <?php
                                $isCompleted = (intval($answer_detail->getAttribute('question')) === intval($question->getAttribute('id'))) ? 'primary' : (is_null($answer_detail->getAttribute('answer')) ? 'default' : 'info');
                                ?>
                                {!! link_to_route('student.course.start.edit', $answer_detail->getAttribute('order'), [$answer_detail->getAttribute('order')], ['class' => "btn btn-$isCompleted width-40px"]); !!}
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-12 margin-top-8 margin-bottom-8">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%;">
                                {{$progress}}%
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-sm-6 col-sm-offset-3 text-center centered">
                        @if($isFinished === 0)
                            {!! $form->open(['route' => ['student.course.finish'], 'method' => 'post']) !!}
                            {!! $form->button('Selesai', ['type' => 'submit', 'class'=> 'btn btn-info']) !!}
                            {!! $form->close() !!}
                        @endif
                    </div>
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
    <link rel="stylesheet" href="{{asset('/assets/css/layout/student/course/start/student_course_start_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/student/course/start/student_course_start_theme_1.min.js')}}"></script>
@endsection
