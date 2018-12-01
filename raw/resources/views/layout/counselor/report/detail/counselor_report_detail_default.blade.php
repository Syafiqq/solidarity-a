<?php
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
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
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
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
<h4>NISN : {{$report->getAttribute('credential')}}</h4>
<h4>Nama : {{$report->getAttribute('name')}}</h4>
<h4>Kelas : {{$student->getAttribute('grade')}}</h4>
<h4>Sekolah : {{$student->getAttribute('school')}}</h4>
<h4>Jenis Kelamin : {{$report->getGenderTranslation()}}</h4>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Mulai Pengisian</th>
        <th>Pengisian Selesai</th>
        @foreach (/** @var \App\Eloquent\QuestionCategory $category */$categories as $category)
            <th>{{ $category->getAttribute('description') }}</th>
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
                <td>{{ $isInProcess ? '-' : (is_null($result) ? '-' : sprintf("%.4g", doubleval($result->getAttribute('result')))) }}</td>
            @endforeach
            <td>{!! $isInProcess ? '-' : link_to_route('counselor.student.publish', $title = 'Cetak', $parameters = [$report->getKey(), $answer->getKey()], $attributes = []); !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
