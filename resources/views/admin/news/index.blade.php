@extends('layouts.admin')
@section('title')
Tin tức
@endsection
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                </ol>
            </nav>
            <a href="{{ route('admin.news.create') }}" class="mr-4">
                <button type="button" class="btn btn-primary btn-rounded btn-icon float-right">
                    <i class="fa fa-plus"></i>
                </button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="order-listing_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="order-listing" class="table dataTable no-footer" role="grid"
                                            aria-describedby="order-listing_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Ảnh</th>
                                                    <th>Ngày viết</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=1;
                                                @endphp
                                                @foreach($list as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        @if ($item->image != null)
                                                            <td>
                                                                <img src="{{ asset('backend/images/news/'.$item->image) }}">
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td>{{ $item->created }}</td>
                                                        <td>
                                                            @if($item->status == 1)
                                                                <span
                                                                    class="badge badge-pill badge-gradient-success">on</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-pill badge-gradient-danger">off</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- show chi tiết sang trang người dùng --}}
                                                            <a href="{{ route('home.news.detail', [$item->id, $item->getUrl()]) }}">
                                                                <button type="button"
                                                                    class="btn btn-info btn-rounded btn-icon">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </a>
                                                            <a
                                                                href="{{ route('admin.news.edit', $item->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-dark btn-rounded btn-icon">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            <a href="{{ route('admin.news.destroy',$item->id) }}"
                                                                onclick="return confirm('Do you want to delete this item?')">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-rounded btn-icon">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
