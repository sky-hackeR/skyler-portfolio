@extends('admin.layout.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $post->title }}</h1>
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid">
            <p>{!! $post->content !!}</p>
        </div>
    </div>
</div>
@endsection
