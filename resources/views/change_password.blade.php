@extends('layouts.home')
@section('title', 'Đăng nhập')
@section('content')
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center border-top-2">
            <h2>Đổi mật khẩu</h2>
        </div>
    </div>
</div>
<div class="login-register-area hm-3-padding mb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="login-form-container">
                                <div class="login-form">
                                    <form action="{{ route('home.change-pass') }}" method="post">
                                        @csrf
                                        <label>Mật khẩu cũ</label>
                                        <input type="password" name="password" placeholder="Mật khẩu">
                                        <label>Mật khẩu mới</label>
                                        <input type="password" name="new_password" placeholder="Mật khẩu mới">
                                        <label>Nhập lại mật khẩu</label>
                                        <input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu">
                                        <div class="button-box">
                                            <button type="submit" class="btn-style cr-btn"><span>Đổi mật khẩu</span></button>
                                        </div>
                                    </form>
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
