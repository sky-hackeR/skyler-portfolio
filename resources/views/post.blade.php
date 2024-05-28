@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content" data-aos="fade-up">
            <p>HOME - BLOG</p>
            <h1 class="section-heading"><img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"> Blog Posts<img src="{{ asset('frontAssets/images/star-2.png') }}" alt="Star"></h1>
        </div>
    </div>
</section>

<!-- Blog Items -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-items">
                    @foreach($posts as $post)
                        <div class="blog-item" data-aos="zoom-in">
                            <div class="img-box">
                                <img src="{{ asset($post->image) }}" alt="Blog">
                            </div>
                            <div class="content">
                                <span class="meta">{{ $post->created_at->format('d M Y') }}</span>
                                <h1><a href="{{ route('viewPost', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h1>
                                <p>{!! Str::limit($post->content, 150, '...') !!}</p>
                                <a href="{{ url('viewPost', $post->slug) }}" class="theme-btn">Read More</a>
                            </div>
                        </div>
                    @endforeach
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
