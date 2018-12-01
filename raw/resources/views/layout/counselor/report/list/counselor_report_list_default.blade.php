<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($reports))
{
    $reports = \Illuminate\Database\Eloquent\Collection::make();
}
$now = \Carbon\Carbon::now();
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
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
<table>
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
</body>
</html>
