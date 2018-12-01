<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <a href="{{route('counselor.profile.edit')}}" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset($user->getAttribute('avatar'))}}" class="user-image img-thumbnail img-circle center-block" width="64px" alt="User Image">
        </a>
        <ul class="dropdown-menu">
            <li class="user-header">
                <img src="{{asset($user->getAttribute('avatar'))}}" class="img-circle" alt="User Image">
            </li>
        </ul>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <li>
                <a href="{{route('counselor.home.dashboard')}}">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{route('counselor.profile.edit')}}">
                    <i class="fa fa-cog"></i>
                    <span>Profile</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li>
                <a href="{{route('counselor.report.list')}}">
                    <i class="fa fa-list"></i>
                    <span>Report</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
