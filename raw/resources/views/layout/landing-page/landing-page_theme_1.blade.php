@extends('layout.bootstrap-landingpage')
<?php
/** @var \Collective\Html\HtmlBuilder $html */
$html = \Collective\Html\HtmlFacade::getFacadeRoot();
?>
@section('head-title')
    <title>Truthfulness</title>
@endsection

@section('head-description')
    <meta name="description" content="Truthfulness">
@endsection

@section('body-content')
    @parent
    <div id="preloader"></div>

    <!--==========================
    Hero Section
    ============================-->
    <section id="hero">
        <div class="hero-container">
            <div class="wow fadeIn">
                <div class="hero-logo">
                    <img class="" src="/assets/baked/landingpage/img/logo.png" alt="Imperial">
                </div>


                <h2 style="font-family: Arial Black; color: #201063; font-style: italic;">Aplikasi Inventori
                    <span class="rotating">Kesadaran Solidaritas Sosial</span>
                                                                                          Bagi Siswa SMA
                </h2>
                <div class="actions">
                    <a href="#about" class="btn-services" style="font-family: Arial;">Mulai Sekarang!</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
    Header Section
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="#hero">
                    <img src="/assets/baked/landingpage/img/logo.png" alt="" title=""/>
                </a>
                <!-- Uncomment below if you prefer to use a text image -->
                <!--<h1><a href="#hero">Header 1</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active">
                        <a style="font-family: comic sans ms; font-size: large;" href="#hero">Beranda</a>
                    </li>
                    <li>
                        <a href="#about" style="font-family: comic sans ms; font-size: large;">Pengantar</a>
                    </li>
                    <li class="menu-has-children">
                        <a href="#subscribe" style="font-family: comic sans ms; font-size: large;">Menggunakan Aplikasi</a>
                        <ul>
                            <li>
                                <a href="{{route('student.auth.register.create')}}" style="font-family: comic sans ms; font-size: large;">Daftar Akun</a>
                            </li>
                            <li>
                                <a href="{{route('student.auth.login.get')}}" style="font-family: comic sans ms; font-size: large;">Masuk Akun</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#testimonials" style="font-family: comic sans ms; font-size: large;">Profil Pengembang</a>
                    </li>
                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <!--==========================
    About Section
    ============================-->
    <section id="about">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Kesadaran Solidaritas Sosial</h3>
                    <div class="section-title-divider"></div>
                    <h2 class="section-description">Penjelasan teoritis dan operasional atas konsep kesadaran solidaritas sosial</h2>
                </div>
            </div>
        </div>
        <div class="container about-container wow fadeInUp">
            <div class="row">
                <div class="col-md-6 col-md-push-6 about-content">
                    <p class="about-text">
                        Kesadaran adalah hal yang dirasakan atau dialami oleh seseorang, atau kesadaran seseorang atas keadaan dirinya sendiri (KBBI). Solidaritas adalah sifat (perasaan) solider, sifat satu rasa (senasib), perasaan setia kawan yang pada suatu kelompok anggota wajib memilikinya,sedangkan sosial adalah berkenaan dengan masyarakat, perlu adanya komunikasi dalam usaha menunjang pembangunan, suka memperhatikan kepentingan umum (Depdiknas, 2007). Solidaritas sosial adalah kepedulian secara bersama kelompok yang menunjukkan pada suatu keadaan hubungan antara individu dan/atau kelompok yang didasarkan pada persamaan moral, kolektif yang sama, dan kepercayaan yang dianut serta diperkuat oleh pengalaman emosional (Johnson:1981).
                    </p>
                    <p class="about-text">
                        Konsep solidaritas berhubungan dengan identifikasi manusia dan dukungan anggota kelompok yang lain yang termasuk didalamnya. Konsep ini berkaitan dengan Durkheim dalam bukunya The Division of Labour in Society yang mengimplikasikan pembagian dari apa yang ia sebut sebagai solidaritas mekanik, solidaritas organik dan solidaritas marginal (Scott, 2010: 268). Solidaritas merupakan fenomena rasional manusia yang datang bersama-sama dalam mencapai kepentingan bersama. Hal ini sesuai dengan pendapat Durkheim (dalam Upe, 2010: 95) menyatakan bahwa “Solidaritas dalam masyarakat bekerja sebagai perekat sosial, dalam konteks ini dapat berupa nilai, adat istiadat, dan kepercayaan yang dianut bersama oleh anggotanya dalam ikatan kesadaran kolektif”. Namun keduanya dibedakan dari segi kesadaranakan kebersamaan tersebut.
                    </p>
                    <p class="about-text">
                        Berdasarkan beberapa pendapat tokoh diatas dapat disimpulkan bahwa Kesadaran solidaritas sosial adalah suatu yang dilakukan dan dirasakan oleh individu tentang kesetiakawanan , kepedulian dalam menjalin hubungan antar individu atau kelompok dalam mencapai kepentingan bersama
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
    Services Section
    ============================-->

    <!--==========================
    Subscrbe Section
    ============================-->
    <section id="subscribe">
        <div style="padding-top: 5rem; padding-bottom: 10rem" class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="subscribe-title">Mulai Menggunakan Aplikasi</h3>
                    <p class="subscribe-text">Aplikasi ini akan menjaga privasi pengguna dengan adanya akun, sehingga setiap pengguna Aplikasi ini wajib memiliki akun untuk menggunakn Aplikasi ini.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 subscribe-btn-container">
                    <p class="subscribe-text" style="text-align: left;">Apabila anda belum memiliki Akun, Silahkan Mendaftarkan Akun untuk menggunakan Aplikasi ini</p>
                    <a class="subscribe-btn" href="{{route('student.auth.register.create')}}" style="font-family: Crete Round; color:white; border-color: white;">Daftar akun</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 subscribe-btn-container">
                    <p class="subscribe-text" style="text-align: left;">Apabila anda sudah memiliki Akun, Silahkan Masuk Akun untuk menggunakan Aplikasi ini</p>
                    <a class="subscribe-btn" href="{{route('student.auth.login.get')}}" style="font-family: Crete Round; color:white; border-color: white;">Masuk akun.</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
    Porfolio Section
    ============================-->

    <!--==========================
    Testimonials Section
    ============================-->
    <section id="testimonials">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Profil Pengembang</h3>
                    <div style="margin-top: 40px" class="section-title-divider"></div>
                    <h2 class="section-description" style="margin-bottom: 0px; color: #064571; font-family: clarendon blk bt;">Dosen Pembimbing & Asisten Dosen Pembimbing</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/prof.jpg" alt="">
                        </div>
                        <h4>Prof. Dr. Hj. Nur Hidayah, M.Pd</h4>
                        <span>Dosen Pembimbing</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Gresik, 17 Agustus 1959 dan Bertempat tinggal di Perum Permata Hijau D/57, Kota Malang. Memiliki Hobby Membaca dan Motto “ Be Your Self”. Telah selesai menempuh Pendidikan S-1 jurusan Bimbingan dan Konseling dan sedang menyelesaikan studi S-2 Bimbingan dan Konseling Universitas Negeri Malang
                        <br>
                        email: nur.hidayah.fip@gmail.com; phone: 082132852538
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Samarinda, 20 Juni 1993 dan Bertempat tinggal di Jl. K. H. Wahid Hasyim No.52 Rt. 08 Samarinda, Kalimantan Timur. Memiliki Hobby Traveling dan Motto “Untuk mendapatkan kesuksesan, keberanianmu harus lebih besar daripada ketakutanmu”. Telah selesai menempuh Pendidikan S-1 jurusan Bimbingan dan Konseling dan sedang menyelesaikan studi S-2 Bimbingan dan Konseling di Universitas Megeri Malang
                        <br>
                        email: yunistia.tia@gmail.com; phone: 0895637859644
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/b.jpg" alt="">
                        </div>
                        <h4>Yunistia Prahastini, S. Pd</h4>
                        <span>Asisten Dosen Pembimbing</span>
                    </div>
                </div>
            </div>

            <div style="margin-top: 40px" class="section-title-divider"></div>
            <h2 style="margin-bottom: 0px; color: #064571;font-family: clarendon blk bt;" class="section-description">CDF Crew - Tim Pengembang Inventori</h2>

            <div class="row">
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/3.jpg" alt="">
                        </div>
                        <h4>Chindy Azza Avrilliya</h4>
                        <span>CDF Crew - NIM. 170111600035</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Lamongan, 26 April 1999 dan Bertempat tinggal di Jl. Sidorejo Rt 02/Rw 04 Kec.Babat Kab. Lamongan. Memiliki Hobby Membaca dan Berekreasi, serta memiliki Motto “Hadapi, Jalani, dan Nikmati”.
                        <br>
                        email: cindyazza26@gmail.com; phone: 081249397176
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Blitar, 10 Mei 1999 dan Bertempat tinggal di Dusun Sebeng, Desa Pagergunung, Rt01/Rw02, Kec.Kesamben, Kab.Blitar. Memiliki Hobby Bernyanyi dan Membaca, serta memiliki Motto “Duri di hari ini adalah bunga di hari esok”.
                        <br>
                        email: dwikresmi@gmail.com; phone: 082245066058
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/1.jpg" alt="">
                        </div>
                        <h4>Dwi Kresminia Ningsih</h4>
                        <span>CDF Crew - NIM. 170111600093</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/2.jpg" alt="">
                        </div>
                        <h4>Nisrina Fatin</h4>
                        <span>CDF Crew - NIM. 170111600057</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Pasuruan, 24 Juli 1998 dan Bertempat tinggal di Tenggulungan Tunggul Wulung Pandaan Pasuruan. Memiliki Hobby Mendengarkan Musik dan Membaca Novel, serta memiliki Motto “Don’t stop when you are tired, But stop when you are done”.
                        <br>
                        email: fatinnisrina400@gmail.com; phone: 087761781402
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
            </div>


            <div style="margin-top: 0px" class="section-title-divider"></div>
            <h2 style="margin-bottom: 0px; color: #064571; font-family: clarendon blk bt;" class="section-description">Tim Pengembang Aplikasi</h2>

            <div class="row">
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Pasuruan, 16 Desember 1993 dan beralamat di Jl. Apel I No. 449 Bangil, Pasuruan. Memiliki Motto "Hidup Seperti LARRY, Hidup Seperti LARRY". Telah menyelesaikan Pendidikan S-1 Teknik Informatika di Universitas Brawijaya.
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/s.png" alt="">
                        </div>
                        <h4>Muhammad Syafiq, S.Kom</h4>
                        <span>Pengembang Aplikasi</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="profile">
                        <div class="pic">
                            <img src="/assets/baked/landingpage/img/h.jpg" alt="">
                        </div>
                        <h4>Husni Hanafi, M.Pd</h4>
                        <span>Pengembang Aplikasi</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="quote" style="color: #064571;">
                        <b>
                            <img src="/assets/baked/landingpage/img/quote_sign_left.png" alt="">
                        </b>
                        Lahir di Pasuruan, 19 Juni 1994 dan beralamat di Jl. Suro No. 40 Bangil, Pasuruan. Memiliki Motto "Berdamai Dengan Kecewa". Telah menyelesaikan Pendidikan S-2 Bimbingan dan Konseling di Universitas Negeri Malang.
                        <small>
                            <img src="/assets/baked/landingpage/img/quote_sign_right.png" alt="">
                        </small>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--==========================
    Team Section
    ============================-->

    <!--==========================
    Contact Section
    ============================-->

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">Content by
                                           &copy; Copyright
                        <strong>CDF Crew - 2018</strong>
                        <a href="">Kesadaran Solidaritas Sosial</a>
                    </div>
                    <div class="credits">
                        <!--
                          All the links in the footer should remain intact.
                          You can delete the links only if you purchased the pro version.
                          Licensing information: https://bootstrapmade.com/license/
                          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Imperial
                        -->
                        Templates by Imperial Theme and
                        <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- #footer -->

    <a href="#" class="back-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>
@endsection



@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/landing-page/landing-page_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/landing-page/landing-page_theme_1.min.js')}}"></script>
@endsection
