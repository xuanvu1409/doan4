@extends('layouts.home')
@section('title', 'Tin tức')
@section('content')
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center border-top-2">
            <h2> Danh sách tin tức </h2>
            <ul>
                <li>
                    <a href="{{ route('home.index') }}">Trang chủ</a>
                </li>
                <li>Tin tức</li>
            </ul>
        </div>
    </div>
</div>
<div class="blog-area mt-5 pb-75 hm-3-padding masonary-style">
    <div class="container-fluid">
        <div class="row blog-grid">
            @foreach ($list as $item)
            <div class="col-lg-4 col-md-6 blog-grid-item">
                <div class="single-blog-wrapper mb-55">
                    @if ($item->image != null)
                    <div class="blog-img mb-30">
                        <a href="{{ route('home.news.detail', [$item->id, $item->getUrl()]) }}">
                            <img src="{{ asset('backend/images/news/'.$item->image) }}" alt="">
                        </a>
                    </div>
                    @endif
                    <div class="blog-content">
                        <h2><a href="{{ route('home.news.detail', [$item->id, $item->getUrl()]) }}">{{ $item->title }}</a></h2>
                        <div class="blog-date-categori">
                            <ul>
                                <li>{{ $item->created }}</li>
                                <li>Admin</li>
                            </ul>
                        </div>
                    </div>
                    <p>{!! $item->description !!}</p>
                    <div class="blog-btn-social mt-20">
                        <div class="blog-btn">
                            <a class="btn-style cr-btn" href="{{ route('home.news.detail', [$item->id, $item->getUrl()]) }}">
                                <span>xem thêm</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
