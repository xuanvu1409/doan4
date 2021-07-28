@extends('layouts.home')
@section('title')
    {{ $news->title }}
@endsection
@section('content')
    <div class="breadcrumb-area mt-37 hm-4-padding">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center border-top-2">
                <h2>tin tức</h2>
                <ul>
                    <li>
                        <a href="{{ route('home.index') }}">Trang chủ</a>
                    </li>
                    <li>Chi tiết tin tức</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog-area start -->
    <div class="blog-area mb-5 hm-3-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="blog-details-wrapper">
                        <div class="single-blog-wrapper">
                            <div class="blog-img mb-30">
                                <img src="{{ asset('backend/images/news/'.$news->image) }}" class="img-detail" alt="">
                            </div>
                            <div class="blog-content">
                                <h2>{{ $news->title }}</h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li>{{ $news->created }} </li>
                                        <li>Admin</li>
                                    </ul>
                                </div>
                            </div>
                            <p>{!! $news->description !!}</p>
                            <p>{!! $news->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->
@endsection
