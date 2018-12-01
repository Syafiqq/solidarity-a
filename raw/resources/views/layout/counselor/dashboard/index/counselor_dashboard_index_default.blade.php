<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
        <th>Kupon</th>
        <th>Pembuat</th>
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
            <td>{{___d($coupon->getAttribute('created_at')->formatLocalized('%e %B %Y %H:%M'))}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! link_to_route('counselor.coupon.generator', $title = 'Generate', $parameters = [], $attributes = []); !!}
</body>
</html>
