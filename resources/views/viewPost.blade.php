@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p>HOME - {{ $post->title }}</p>
            <h1 class="section-heading"><img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> {{ $post->title }} <img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"></h1>
        </div>
    </div>
</section>

<!-- Blog Details -->
<section class="blog-details-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-details-content">
                    <div class="img-box">
                        <img src="{{ asset( $post->image) }}" alt="Blog">
                    </div>
                    <span class="meta">{{ $post->created_at->format('d M Y') }} - 5 Minutes Read</span>
                    <h1>{{ $post->title }}</h1>
                    <p>{!! nl2br(e(strip_tags($post->content))) !!}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-sidebar">
                    <div class="blog-sidebar-inner">

                        <div class="blog-sidebar-widget search-widget">
                            <div class="blog-sidebar-widget-inner" data-aos="zoom-in">
                                <form class="shadow-box" action="" method="GET">
                                    <input type="text" name="query" placeholder="Search Here...">
                                    <button class="theme-btn" type="submit">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="blog-sidebar-widget recent-post-widget" data-aos="zoom-in">
                            <div class="blog-sidebar-widget-inner shadow-box">
                                <h3>Recent Posts</h3>

                                <ul>
                                    @foreach($recentPosts as $recentPost)
                                        <li><a href="{{ route('viewPost', $recentPost->slug) }}">{{ $recentPost->title }}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
