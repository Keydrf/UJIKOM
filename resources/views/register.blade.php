<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('argon/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('argon/assets/img/seagames.png')}}">
    <title>
        Register | SEA GAMES
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('argon/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
    <link href="{{asset('argon/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('argon/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                </ul>
                <ul class="navbar-nav d-lg-block d-none">
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Selamat Datang!</h1>
                        <p class="text-lead text-white"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register</h5>
                            <div class="card-body">
                                <form action="/registeruser" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nama" aria-label="Name" autofocus required>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" autofocus required>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" aria-label="Password" autofocus required>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check form-check-info text-start">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Saya Setuju <a href="javascript:;" class="text-dark font-weight-bolder">Syarat dan Ketentuannya</a>
                                        </label>
                                    </div>
                                    <!-- /.col -->
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign In</button>
                                    </div>
                                    <!-- /.col -->
                                    <!-- <div class="text-center">
                                        <button type="button" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div> -->
                                    <p class="text-sm mt-3 mb-0">Sudah memiliki akun? <a href="/login" class="text-dark font-weight-bolder">Log in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="{{asset('argon/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('argon/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('argon/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>