<!doctype html>
<html lang="en">

    
<head>
    <meta charset="utf-8" />
    <title>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->site_name : "skY" }} - Admin Authentication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->description : "Comprehensive Portfolio" }}" name="description" />
    <meta content="sky-hackeR(+2348082574927)" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}">


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">

                            @yield('content')
                        </div>
                        <div class="mt-5 text-center">
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> skyhackeR.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
    </body>

</html>