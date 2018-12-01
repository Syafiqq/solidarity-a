<?php
/**
 * @var \App\Eloquent\User $user
 */
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($user))
{
    $user = null;
}
/** @var \App\Eloquent\UserStudents $student */
/** @noinspection PhpUndefinedVariableInspection */
$student = $user->getAttribute('student');
/** @var \App\Eloquent\Answer $answer */
$answer = $user->getAttribute('answer')->last();
$now    = \Carbon\Carbon::now();

?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
</head>
<body>
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
@if($user->hasOpenedCourse())
    {!! link_to_route('student.course.start.edit', $title = 'Lanjutkan Sebelumnya', $parameters = [1], $attributes = []);  !!}
@elseif((intval($student->getAttribute('active')) === 1) || is_null($answer) ||($answer->getAttribute('finished_at')->diffInDays($now) > \App\Eloquent\Answer::$exerciseWindow))
    {!! link_to_route('student.course.create', $title = 'Mulai Baru', $parameters = [], $attributes = []);  !!}
@else
    Anda Tidak Diperkenankan Mengerjakan, Silahkan Hubungi Konselor Anda.
@endif
</body>
</html>
