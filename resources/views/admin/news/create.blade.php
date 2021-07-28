@extends('layouts.admin')
@section('title')
Create Product
@endsection
@section('css')
@endsection
@section('script')
<script src="{{ asset('backend/vendors/ckeditor/ckeditor.js') }}"></script>
{{-- <script src="{{ asset('backend/vendors/ckeditor-2/ckeditor.js') }}"></script> --}}
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
</script>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Bảng điều khiển</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm mới tin tức</h4>
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <label>Tiêu đề (<span style="color:red">*</span>)</label>
                                <input class="form-control" name="title" type="text" required>
                                @error('title')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mô tả (<span style="color:red">*</span>)</label>
                                <textarea id="editor1" class="form-control" cols="80" rows="10"
                                    name="description"></textarea>
                                    @error('description')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Bài viết (<span style="color:red">*</span>)</label>
                                <textarea id="editor2" class="form-control" cols="80" rows="10"
                                    name="content"></textarea>
                                    @error('content')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Chọn trạng thái (Mặc định hiển thị)</option>
                                        <option value="0">off</option>
                                        <option value="1">on</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Thứ tự sắp xếp</label>
                                    <input class="form-control" name="sort_order" type="number">
                                    @error('sort_order')
                                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" class="form-control" name="image" data-role="preview-image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div id="preview-image"></div>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary btn-icon-text offset-4">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                Submit
                            </button>
                            <a href="{{ route('admin.news') }}"
                                class="btn btn-gradient-danger btn-icon-text">
                                <i class="fa fa-times-circle-o btn-icon-prepend"></i>
                                Canel
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
