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
$form       = \Collective\Html\FormFacade::getFacadeRoot();
$isFinished = $summary->filter(function ($answer_detail) {
    return is_null($answer_detail->getAttribute('answer'));
})->count();
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Start</title>
</head>
<body>
@foreach($summary as $answer_detail)
    {!! link_to_route('student.course.start.edit', $answer_detail->getAttribute('question'), [$answer_detail->getAttribute('question')]); !!}
@endforeach
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong>
        There were some problems with your input.
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! $form->model($current, ['route' => ['student.course.start.update', $current->getAttribute('question')], 'method' => 'patch']) !!}
<h5>{{$question->getAttribute('question')}}</h5>
@foreach($options as $option)
    {!! $form->radio('answer', $option->getAttribute('id'))!!}
    {{$option->getAttribute('description')}}
    {!! nl2br(PHP_EOL) !!}
@endforeach
{!! $form->button('Simpan', ['type' => 'submit']) !!}
{!! $form->close() !!}
@if(is_null($prev))
    << Sebelumnya
@else
    {!! link_to_route('student.course.start.edit', '<< Sebelumnya', [$prev->getAttribute('question')]); !!}
@endif

@if(is_null($next))
    Selanjutnya >>
@else
    {!! link_to_route('student.course.start.edit', 'Selanjutnya >>', [$next->getAttribute('question')]); !!}
@endif

@if($isFinished === 0)
    {!! $form->open(['route' => ['student.course.finish'], 'method' => 'post']) !!}
    {!! $form->button('Selesai', ['type' => 'submit']) !!}
    {!! $form->close() !!}
@endif
</body>
</html>
