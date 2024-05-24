{{-- @extends('layouts.app')

@section('content')


<!-- Projects -->
<section class="projects-area">
    <div class="container">
        <h1 class="section-heading" data-aos="fade-up"><img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> All Projects <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"></h1>
        <div class="row">
            <div class="col-md-4">
                <div data-aos="zoom-in">
                    <div class="project-item shadow-box">
                        <a class="overlay-link" href="work-details.html"></a>
                        <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                        <div class="project-img">
                            <img src="{{ asset('frontAssets/images/project1.jpg') }}" alt="Project">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="project-info">
                                <p>WEB DESIGNING</p>
                                <h1>Dynamic</h1>
                            </div>
                            <a href="work-details.html" class="project-btn">
                                <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                            </a>
                        </div>
                    </div>
                </div>
                
                <div data-aos="zoom-in">
                    <div class="project-item shadow-box">
                        <a class="overlay-link" href="work-details.html"></a>
                        <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                        <div class="project-img">
                            <img src="{{ asset('frontAssets/images/project2.jpg') }}" alt="Project">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="project-info">
                                <p>PHOTOGRAPHY</p>
                                <h1>Diesel H1</h1>
                            </div>
                            <a href="work-details.html" class="project-btn">
                                <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-8">
                <h1 class="section-heading" data-aos="fade-up"><img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> All Projects <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"></h1>
                
                <div class="d-flex align-items-start gap-24">
                    <div data-aos="zoom-in" class="flex-1">
                        <div class="project-item shadow-box">
                            <a class="overlay-link" href="work-details.html"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="project-img">
                                <img src="{{ asset('frontAssets/images/project3.jpg') }}" alt="Project">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="project-info">
                                    <p>mOBILE DESIGNING</p>
                                    <h1>Seven Studio</h1>
                                </div>
                                <a href="work-details.html" class="project-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div data-aos="zoom-in" class="flex-1">
                        <div class="project-item shadow-box">
                            <a class="overlay-link" href="work-details.html"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="project-img">
                                <img src="{{ asset('frontAssets/images/project4.jpg') }}" alt="Project">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="project-info">
                                    <p>Branding</p>
                                    <h1>Raven Studio</h1>
                                </div>
                                <a href="work-details.html" class="project-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex align-items-start gap-24">
                    <div data-aos="zoom-in" class="flex-1">
                        <div class="project-item shadow-box">
                            <a class="overlay-link" href="work-details.html"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="project-img">
                                <img src="{{ asset('frontAssets/images/project5.jpg') }}" alt="Project">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="project-info">
                                    <p>mOBILE DESIGNING</p>
                                    <h1>Submarine</h1>
                                </div>
                                <a href="work-details.html" class="project-btn">
                                    <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div data-aos="zoom-in" class="flex-1">
                        <div class="project-item shadow-box">
                            <a class="overlay-link" href="work-details.html"></a>
                            <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                            <div class="project-img">
                                <img src="{{ asset('frontAssets/images/project6.jpg') }}" alt="Project">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="project-info">
                                    <p>wEB DESIGNING</p>
                                    <h1>Hydra Merc</h1>
                                </div>
                                <a href="work-details.html" class="project-btn">
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

@endsection --}}



@extends('layouts.app')

@section('content')

<section class="projects-area">
    <div class="container">
        <h1 class="section-heading" data-aos="fade-up">
            <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> All Projects 
            <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star">
        </h1>
        <div class="row">
            @php
                $count = count($projects);
                $isMultiColumn = $count > 4;
            @endphp

            @if ($isMultiColumn)
                <div class="col-md-4">
                    @foreach ($projects->slice(0, 2) as $project)
                        <div data-aos="zoom-in">
                            <div class="project-item shadow-box">
                                <a class="overlay-link" href=""></a>
                                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                                <div class="project-img">
                                    @foreach ($project->images->take(1) as $image)
                                        <img src="{{ asset($image->image) }}" alt="Project Image">
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="project-info">
                                        <p>{{ $project->services }}</p>
                                        <h1>{{ $project->title }}</h1>
                                    </div>
                                    <a href="" class="project-btn">
                                        <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-8">
                    <h1 class="section-heading" data-aos="fade-up">
                        <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> All Projects 
                        <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star">
                    </h1>
                    @foreach ($projects->slice(2)->chunk(2) as $chunk)
                        <div class="d-flex align-items-start gap-24">
                            @foreach ($chunk as $project)
                                <div data-aos="zoom-in" class="flex-1">
                                    <div class="project-item shadow-box">
                                        <a class="overlay-link" href=""></a>
                                        <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                                        <div class="project-img">
                                            @foreach ($project->images->take(1) as $image)
                                                <img src="{{ asset($image->image) }}" alt="Project Image">
                                            @endforeach
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="project-info">
                                                <p>{{ $project->services }}</p>
                                                <h1>{{ $project->title }}</h1>
                                            </div>
                                            <a href="" class="project-btn">
                                                <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                @foreach ($projects as $key => $project)
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-24">
                            <div class="project-item shadow-box">
                                <a class="overlay-link" href=""></a>
                                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                                <div class="project-img">
                                    @foreach ($project->images->take(1) as $image)
                                        <img src="{{ asset($image->image) }}" alt="Project Image">
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="project-info">
                                        <p>{{ $project->services }}</p>
                                        <h1>{{ $project->title }}</h1>
                                    </div>
                                    <a href="" class="project-btn">
                                        <img src="{{ asset('frontAssets/images/icon.svg') }}" alt="Button">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($key == 1 && $count == 2)
                        <div class="col-md-4">
                            <h1 class="section-heading" data-aos="fade-up">
                                <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> All Projects 
                                <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star">
                            </h1>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
