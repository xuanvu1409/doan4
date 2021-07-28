@extends('layouts.admin')
@section('title')
Show Customer
@endsection
@section('css')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.customer') }}">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Show Customer</h4>
                    <fieldset>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control text-center" value="{{ ucwords($customer->name) }}" disabled>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Phone</label>
                                <input class="form-control text-center" value="{{ $customer->phone }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Email</label>
                                <input class="form-control text-center" value="{{ $customer->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Address</label>
                            <input class="form-control text-center" value="{{ ucwords($customer->address) }}" disabled>
                        </div>
                        <a href="{{ route('admin.bill') }}"
                            class="btn btn-gradient-danger btn-icon-text offset-5">
                            <i class="fa fa-times-circle-o btn-icon-prepend"></i>
                            Canel
                        </a>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
