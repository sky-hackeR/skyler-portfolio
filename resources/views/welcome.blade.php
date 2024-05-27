@extends('layouts.app')

@section('content')


<!-- About -->
<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-me-box shadow-box">
                    <a class="overlay-link" href="{{ url('/about') }}"></a>
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <div class="img-box">
                        <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->image : "" }}" height="40" alt="About Me">
                    </div>
                    <div class="infos">
                        <h4>A SOFTWARE ENGINEER</h4>
                        <h1>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->username : "" }}.</h1>
                        @foreach($about as $item)
                            @php
                                $firstSentence = strstr($item->description, '.');
                                if ($firstSentence === false) {
                                    $firstSentence = strstr($item->description, '!');
                                }
                                if ($firstSentence === false) {
                                    $firstSentence = strstr($item->description, '?');
                                }
                                if ($firstSentence === false) {
                                    $firstSentence = $item->description;
                                } else {
                                    $firstSentence = substr($item->description, 0, strpos($item->description, $firstSentence) + 1);
                                }
                            @endphp
                            <p>{!! $firstSentence !!}</p>
                        @endforeach
                        <a href="{{ url('/about') }}" class="about-btn">
                            <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-credentials-wrap">
                    <div data-aos="zoom-in">
                        <div class="banner shadow-box">
                            <div class="marquee">
                                <div>
                                  <span>LATEST WORK AND <b>FEATURED</b> <img src="{{ asset('frontAssets/images/star1.svg') }}" alt="Star"> LATEST WORK AND <b>FEATURED</b> <img src="{{ asset('frontAssets/images/star1.svg') }}" alt="Star"> LATEST WORK AND <b>FEATURED</b> <img src="{{ asset('frontAssets/images/star1.svg') }}" alt="Star"> LATEST WORK AND <b>FEATURED</b> LATEST WORK AND <img src="{{ asset('frontAssets/images/star1.svg') }}" alt="Star"> LATEST WORK AND <b>FEATURED</b> LATEST WORK AND <img src="{{ asset('frontAssets/images/star1.svg') }}" alt="Star"></span>
                                </div>
                              </div>
                        </div>

                    </div>

                    <div class="gx-row d-flex gap-24">
                        <div data-aos="zoom-in">
                            <div class="about-crenditials-box info-box shadow-box h-full">
                                <a class="overlay-link" href="{{ url('/credentials') }}"></a>
                                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                                <img src="{{ asset('frontAssets/images/sign.png') }}" alt="Sign">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="infos">
                                        <h4>more about me</h4>
                                        <h1>Credentials</h1>
                                    </div>

                                    <a href="{{ url('/credentials') }}" class="about-btn">
                                        <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div data-aos="zoom-in">
                            <div class="about-project-box info-box shadow-box h-full">
                                <a class="overlay-link" href="{{ url('/project') }}"></a>
                                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                                <img src="{{ asset('frontAssets/images/my-works.png') }}" alt="My Works">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="infos">
                                        <h4>SHOWCASE</h4>
                                        <h1>Projects</h1>
                                    </div>

                                    <a href="{{ url('/project') }}" class="about-btn">
                                        <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-24">
            <div class="col-md-12">
                <div class="blog-service-profile-wrap d-flex gap-24">
                    <div data-aos="zoom-in">
                        <div class="about-blog-box info-box shadow-box h-full">
                            <a href="{{ url('/post') }}" class="overlay-link"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <img src="{{ asset('frontAssets/images/gfonts.png') }}" alt="GFonts">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="infos">
                                    <h4>Blog</h4>
                                    <h1>GFonts</h1>
                                </div>

                                <a href="{{ url('/post') }}" class="about-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div data-aos="zoom-in" class="flex-1">
                        <div class="about-services-box info-box shadow-box h-full">
                            <a href="{{ url('/services') }}" class="overlay-link"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="icon-boxes d-flex align-items-center justify-content-center"> <!-- Add this class -->
                                @foreach($service as $item)
                                    <div class="icon-box"> <!-- Wrap each icon in a div with this class -->
                                        <i class="{{ $item->icon }} icon"></i>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="infos">
                                    <h4>specialization</h4>
                                    <h1>Services Offering</h1>
                                </div>
                                <a href="{{ url('/services') }}" class="about-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div data-aos="zoom-in">
                        <div class="about-profile-box info-box shadow-box h-full">
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="inner-profile-icons shadow-box">
                                @foreach ($socials->take(2) as $social)
                                    <a href="{{ $social->link }}">
                                        <i class="{{ $social->icon }}"></i>
                                    </a>
                                @endforeach
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="infos">
                                    <h4>Stay with me</h4>
                                    <h1>Profiles</h1>
                                </div>

                                <a href="{{ url('/contact') }}" class="about-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <div class="row mt-24">
            <div class="col-md-6" data-aos="zoom-in">
                    
                <div class="about-client-box info-box shadow-box">
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">

                    @foreach ($counter as $item)
                        <div class="clients d-flex align-items-start gap-24 justify-content-center">
                            <div class="client-item">
                                <h1>{{ $item->year }}</h1>
                                <p>Years <br>Experience</p>
                            </div>

                            <div class="client-item">
                                <h1>{{ $item->clients }}</h1>
                                <p>CLIENTS <br>WORLDWIDE</p>
                            </div>

                            <div class="client-item">
                                <h1>{{ $item->projects }}</h1>
                                <p>Total <br>Projects</p>
                            </div>
                        </div>
                    @endforeach
                    
                </div>

            </div>
            <div class="col-md-6" data-aos="zoom-in">
                    
                <div class="about-contact-box info-box shadow-box">
                    <a class="overlay-link" href="{{ url('/contact') }}"></a>
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <img src="{{ asset('frontAssets/images/icon2.png') }}" alt="Icon" class="star-icon">
                    <h1>Let's <br>work <span>together.</span></h1>
                    <a href="{{ url('/contact') }}" class="about-btn">
                        <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection