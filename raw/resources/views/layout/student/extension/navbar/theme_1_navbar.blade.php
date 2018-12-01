<header class="main-header">
    <!-- Logo -->
    <a href="{{route('student.course.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F-A</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Solidaritas</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {!! isset($pre_right_menu) ? $pre_right_menu : ''!!}
                <li>
                    <a href="" id="music-opener" data-toggle="modal" data-target="#music-modal">
                        <i class="fa fa-music"></i>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.auth.logout')}}">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
