@extends('layouts.app')

@section('content')

<style>
    .breadcrumb-text {
        text-transform: uppercase;
    }
    /* Additional styles for unique image display */
    .project-details-img {
        position: relative;
        margin-bottom: 24px;
        overflow: hidden; /* Ensures images stay within the container */
        border-radius: 10px; /* Adds rounded corners */
    }
    .project-details-img img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease; /* Animation effect */
    }
    .project-details-img:hover img {
        transform: scale(1.05); /* Scale effect on hover */
    }
    .project-details-3-img {
        position: relative;
        overflow: hidden; /* Ensures images stay within the container */
        border-radius: 10px; /* Adds rounded corners */
    }
    .project-details-3-img img {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease; /* Animation effect */
    }
    .project-details-3-img:hover img {
        transform: scale(1.05); /* Scale effect on hover */
    }
</style>

<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p class="breadcrumb-text">{{ $project->services }} - {{ $project->client }}</p>
            <h1 class="section-heading">
                <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> 
                {{ $project->title }} 
                <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star">
            </h1>
        </div>
    </div>
</section>

<section class="project-details-wrap">
    <div class="project-details-img" data-aos="zoom-in">
        @if ($project->images->isNotEmpty())
            <img src="{{ asset($project->images->first()->image) }}" alt="{{ $project->title }}">
        @else
            <img src="{{ asset('frontAssets/images/default-image.jpg') }}" alt="Default Image">
        @endif
    </div>

    <div class="container">
        <div data-aos="zoom-in">
            <div class="d-flex project-infos-wrap shadow-box mb-24">
                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                <img src="{{ asset('frontAssets/images/icon2.png') }}" alt="Icon">
                <div class="project-details-info flex-1">
                    <h3>{{ $project->client }}</h3>
                    <p>{!! $project->about_client !!}</p>
                </div>

                <div class="project-details-info flex-1">
                    <h3>About</h3>
                    <p>{!! $project->about_project !!}</p>
                </div>
            </div>
        </div>

        <div class="project-details-2-img mb-24" data-aos="zoom-in">
            @if ($project->images->isNotEmpty())
                <img src="{{ asset($project->images->first()->image) }}" alt="{{ $project->title }}">
            @else
                <img src="{{ asset('frontAssets/images/default-image.jpg') }}" alt="Default Image">
            @endif
        </div>

        <div class="row mb-24">
            @forelse ($project->images->slice(1) as $image)
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="project-details-3-img">
                        <img src="{{ asset($image->image) }}" alt="Project Image">
                    </div>
                </div>
            @empty
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="project-details-3-img">
                        <img src="{{ asset('frontAssets/images/default-image.jpg') }}" alt="Default Image">
                    </div>
                </div>
            @endforelse
        </div>

        <div data-aos="zoom-in">
            <div class="project-about-2 d-flex shadow-box mb-24">
                <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                <div class="left-details">
                    <img src="{{ asset('frontAssets/images/icon3.png') }}" alt="Icon">
                    <ul>
                        <li>
                            <p>Year</p>
                            <h4>{{ $project->year }}</h4>
                        </li>
                        <li>
                            <p>Client</p>
                            <h4>{{ $project->client }}</h4>
                        </li>
                        <li>
                            <p>Services</p>
                            <h4>{{ $project->services }}</h4>
                        </li>
                        <li>
                            <p>Project Type</p>
                            <h4>{{ $project->project_type }}</h4>
                        </li>
                    </ul>
                </div>
                <div class="right-details">
                    <h3>Description</h3>
                    <p>{!! $project->description !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-center" data-aos="zoom-in">
        <a href="#" class="big-btn shadow-box">
            Next Project
        </a>
    </div>
</section>

@endsection
