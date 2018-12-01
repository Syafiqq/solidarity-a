@extends('layout.student.extension.adminlte-sidebar')
<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
?>
@section('head-title')
    <title>Profile</title>
@endsection

@section('head-description')
    <meta name="description" content="Profile">
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
                    Profile
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                {!! $form->model($student, ['route' => ['student.profile.update'], 'method' => 'patch']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Profile</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="school">Sekolah</label>
                        {!! $form->input('text','school', null, ['id'=>'school', 'placeholder' => 'Sekolah', 'required'=> true, 'class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="grade">Kelas</label>
                        {!! $form->input('text','grade', null, ['id'=> 'grade', 'placeholder' => 'Kelas', 'required'=> true, 'class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $form->button('Submit', ['type' => 'Submit', 'class' => 'btn btn-info']) !!}
                </div>
            {!! $form->close() !!}
            <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/student/profile/edit/student_profile_edit_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/student/profile/edit/student_profile_edit_theme_1.min.js')}}"></script>
@endsection
