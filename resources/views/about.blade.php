@extends('layouts.app')

@section('content')


<!-- About -->
<section class="about-area">
    <div class="container">
        <div class="d-flex about-me-wrap align-items-start gap-24">
            <div data-aos="zoom-in">
                <div class="about-image-box shadow-box">
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <div class="image-inner">
                        <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->image : "" }}" alt="About Me">
                    </div>
                </div>
            </div>

            <div class="about-details" data-aos="zoom-in">
                <h1 class="section-heading" data-aos="fade-up"><img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star">  @foreach($about as $item) {{ $item->title }} @endforeach<img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"></h1>
                <div class="about-details-inner shadow-box">
                    <img src="{{ asset('frontAssets/images/icon2.png') }}" alt="Star">
                    <h1>{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->username : "" }}</h1>
                    @foreach($about as $item)
                        <p>{!! $item->description !!}</p>
                    @endforeach
                </div>

            </div>
        </div>

        <div class="row mt-24">
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-edc-exp about-experience shadow-box">
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <h3>EXPERIENCE</h3>

                    <ul>
                        @foreach($experience as $exp)
                            <li>
                                <p class="date">{{ $exp->start_year }} - {{ $exp->end_year }}</p>
                                <h2>{{ $exp->position }}</h2>
                                <p class="type">{{ $exp->company }}</p>
                                <p>{{ strip_tags($exp->description) }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="zoom-in">
                <div class="about-edc-exp about-education shadow-box">
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <h3>EDUCATION</h3>

                    <ul>
                        @foreach($education as $edu)
                        <li>
                            <p class="date">{{ $edu->start_year }} - {{ $edu->end_year }}</p>
                            <h2>{{ $edu->degree }}</h2>
                            <p class="type">{{ $edu->school }}</p>
                            <p>{{ strip_tags($edu->description) }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-24">
            <div class="col-md-12">
                <div class="d-flex profile-contact-credentials-wrap gap-24">

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

                    <div data-aos="zoom-in" class="flex-1">
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

                    <div data-aos="zoom-in" class="h-full">
                        <div class="about-crenditials-box info-box shadow-box">
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

                </div>
            </div>
        </div>
    </div>
</section>

@endsection