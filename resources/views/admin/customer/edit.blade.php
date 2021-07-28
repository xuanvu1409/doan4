@extends('layouts.admin')
@section('title')
    Sửa khách hàng
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Bảng điều khiển</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.customer') }}">Khách hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Customer</h4>
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('admin.customer.update', $customer->id) }}">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Tên khách hàng (<span style="color:red">*</span>)</label>
                                    <input class="form-control" name="name" type="text" value="{{ $customer->name }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Địa chỉ (<span style="color:red">*</span>)</label>
                                    <input class="form-control" name="phone" type="number" value="{{ $customer->phone }}"
                                    disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Email (<span style="color:red">*</span>)</label>
                                    <input class="form-control" name="email" type="email" value="{{ $customer->email }}"
                                    disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Mật khẩu</label>
                                    <input class="form-control" name="password" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Địa chỉ (<span style="color:red">*</span>)</label>
                                <input class="form-control" name="address" type="text" value="{{ $customer->address }}"
                                disabled>
                            </div>

                            <button type="submit" class="btn btn-gradient-primary btn-icon-text offset-4">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                Submit
                            </button>
                            <a href="{{ route('admin.customer') }}"
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
