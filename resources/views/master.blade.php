@include('laravel-mentor::partials.header')
            @include('laravel-mentor::partials.nav')
            <!-- begin app-container -->
            <div class="app-container">
                @include('laravel-mentor::partials.sidebar')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        @include('laravel-mentor::partials.breadcrumb')
                        <!-- Notification -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                                    <strong>Holy guacamole!</strong> You should check in on some of those
                                    fields below.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ti ti-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        @yield('content')
                        
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
@include('laravel-mentor::partials.footer')