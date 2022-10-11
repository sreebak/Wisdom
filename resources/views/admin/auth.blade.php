<!doctype html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>@yield('page-title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Web Admin & Dashboard Template" name="description" />
        <meta content="Reon Technologies" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/admin-theme/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/admin-theme/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/admin-theme/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/admin-theme/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="#" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="text-primary p-4">
                                            @yield('page-head')
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-end">
                                        <img src="/admin-theme/assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="#">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="/admin-theme/assets/images/logo-sm.png" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    @yield('content')
                                </div>
            
                            </div>
                        </div>
                        <!--
                        <div class="mt-5 text-center">
                            <p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>
                            <p>© 2020 Reon Technologies. Crafted with <i class="mdi mdi-heart text-danger"></i> by Reon Technologies</p>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
