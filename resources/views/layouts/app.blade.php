
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpriverthemes.com/landing/gridx-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 May 2024 15:13:47 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->description : "Solution to All" }}</title>
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">


    <!-- Custom Scrollbar Styles -->
    <style>
        /* For WebKit browsers (Chrome, Safari, etc.) */
        ::-webkit-scrollbar {
            width: 4px; /* Adjust the width as needed */
            height: 4px; /* Adjust the height as needed */
        }
    
        ::-webkit-scrollbar-track {
            background: transparent; /* Transparent background for the track */
        }
    
        ::-webkit-scrollbar-thumb {
            background: #2b2a2a; /* Grey scrollbar thumb */
            border-radius: 10px; /* Round the corners of the scrollbar thumb */
        }
    
        ::-webkit-scrollbar-thumb:hover {
            background: #555; /* Dark grey when hovering */
        }
    </style>
    


    <link rel="stylesheet" href="{{ asset('frontAssets/cdn.jsdelivr.net/gh/iconoir-icons/iconoir%40main/css/iconoir.css') }}">

    <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('frontAssets/css/style.css') }}">
</head>
<body>

    <main class="main-homepage">

        <!-- Header -->
        <header class="header-area">
            <div class="container">
                <div class="gx-row d-flex align-items-center justify-content-between">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->logo_top : "" }}" alt="Logo" height="40">
                    </a>

                    <nav class="navbar">
                        <ul class="menu">
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{ url('/about') }}">About</a></li>
                            <li class="{{ request()->is('project') ? 'active' : '' }}"><a href="{{ url('/project') }}">Projects</a></li>
                            <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="theme-btn">Let's talk</a>
                    </nav>                    

                    <a href="{{ url('/contact') }}" class="theme-btn">Let's talk</a>

                    <div class="show-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <!-- Footer -->
        <footer class="footer-area">
            <div class="container">
                <div class="footer-content text-center">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->logo_top : "" }}" alt="Logo" height="40">
                    </a>
                    <ul class="footer-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/project') }}">Projects</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                    <p class="copyright">
                        &copy; All rights reserved by <span>{{ env('APP_AUTHOR') }}</span>
                    </p>
                </div>
            </div>
        </footer>

    </main>
    

    <script src="{{ asset('frontAssets/js/jquery-3.6.4.js') }}"></script>
    <script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/aos.js') }}"></script>
    <script src="{{ asset('frontAssets/js/main.js') }}"></script>
</body>

</html>