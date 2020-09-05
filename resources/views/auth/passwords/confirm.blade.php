<!DOCTYPE html>
<html lang="en">


<head>
    <title>
        @yield('title_prefix', config('laravel-mentor.title_prefix', ''))
        @yield('title', 'Confirm')
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/laravel-mentor/assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/laravel-mentor/assets/css/style.css') }}" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            @if(config('laravel-mentor.enable_preloader'))
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('vendor/laravel-mentor/assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            @endif

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">We Are Mentor</h1>
                                        <p>Welcome back, please login to your account.</p>
                                        <form action="" class="mt-3 mt-sm-5">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email Address*</label>
                                                        <input type="email" class="form-control" placeholder="Username" />
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <a href="index.html" class="btn btn-primary text-uppercase">Verify</a>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="{{ asset('vendror/laravel-mentor/assets/js/vendors.js') }}"></script>

    <!-- custom app -->
    <script src="{{ asset('vendor/laravel-mentor/assets/js/app.js') }}"></script>
</body>


</html>