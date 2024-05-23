@extends('layouts.app')

@section('content')

<!-- Credentials -->
<section class="credential-area">
    <div class="container">
        <div class="gx-row d-flex">
            <div class="credential-sidebar-wrap" data-aos="zoom-in">
                <div class="credential-sidebar text-center">
                    <div class="shadow-box">
                        <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                        <div class="img-box">
                            <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->image : "" }}" alt="About Me">
                        </div>
                        <h2></h2>
                        <p>@sky-hackeR</p>
                        <ul class="social-links d-flex justify-content-center">
                            @foreach ($socials->take(4) as $social)
                                <li><a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                        <a href="{{ url('/contact') }}" class="theme-btn">Contact Me</a>
                    </div>
                </div>
            </div>

            <div class="credential-content flex-1">
                @foreach ($about as $item)
                    <div class="credential-about" data-aos="zoom-in">
                        <h2>About Me</h2>
                        @php
                            $sentences = explode("\n", $item->about);
                        @endphp
                        @foreach ($sentences as $sentence)
                            <p>{!! $sentence !!}</p>
                        @endforeach
                    </div>
                @endforeach

                <div class="credential-edc-exp credential-experience">
                    <h2 data-aos="fade-up">Experience</h2>
                    @foreach($experience as $exp)
                        <div class="credential-edc-exp-item" data-aos="zoom-in">
                            <h4>{{ $exp->start_year }} - {{ $exp->end_year }}</h4>
                            <h3>{{ $exp->position }}</h3>
                            <h5>{{ $exp->company }}</h5>
                            <p>{!! $exp->description !!}</p>
                        </div>
                    @endforeach
                </div>

                <div class="credential-edc-exp credential-education">
                    <h2 data-aos="fade-up">Education</h2>
                    @foreach($education as $edu)
                        <div class="credential-edc-exp-item" data-aos="zoom-in">
                            <h4>{{ $edu->start_year }} - {{ $edu->end_year }}</h4>
                            <h3>{{ $edu->degree }}</h3>
                            <h5>{{ $edu->school }}</h5>
                            <p>{!! $edu->description !!}</p>
                        </div>
                    @endforeach
                </div>

                <div class="skills-wrap">
                    <h2 data-aos="fade-up">Skills</h2>
                    <div class="d-grid skill-items gap-24 flex-wrap">
                        @foreach($skill as $item)
                            <div class="skill-item" data-aos="zoom-in">
                                <span class="percent">{{ $item->percentage . '%' }}</span>
                                <h3 class="name">{{ $item->skill }}</h3>
                                <p>{{ $item->proficiency }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="skills-wrap awards-wrap">
                    <h2 data-aos="fade-up">Certificates</h2>
                    <div class="d-grid skill-items gap-24 flex-wrap">
                        @foreach($certificate as $item)
                            <div class="skill-item" data-aos="zoom-in">
                                <span class="percent">{{ $item->date }}</span>
                                <h3 class="name">{{ $item->name }}</h3>
                                <p>{!! $item->description !!}</p>
                            </div>
                        @endforeach    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection