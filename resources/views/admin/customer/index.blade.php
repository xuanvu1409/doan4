@extends('layouts.admin')
@section('title')
Khách hàng
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                <li class="breadcrumb-item active" aria-current="page">Khách hàng</li>
            </ol>
        </nav>
        {{-- <a href="{{ route('admin.customer.create') }}" class="mr-4">
            <button type="button" class="btn btn-primary btn-rounded btn-icon float-right">
                <i class="fa fa-plus"></i>
            </button>
        </a> --}}
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
                                                <th>Tên khách hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp
                                                @foreach($customers as $customer)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{ ucwords($customer->name) }}</td>
                                                        <td>{{$customer->phone}}</td>
                                                        <td>{{$customer->email}}</td>
                                                        <td>{{ ucwords($customer->address) }}</td>
                                                        <td>
                                                            {{-- <a
                                                                href="{{ route('admin.customer.show', $customer->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-info btn-rounded btn-icon">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </a> --}}
                                                            <a
                                                                href="{{ route('admin.customer.edit', $customer->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-dark btn-rounded btn-icon">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </a>
                                                            {{-- <a
                                                                href="{{ route('admin.customer.destroy', $customer->id) }}" onclick="return confirm('Do you want to delete this customer?')">
                                                                <button type="button"
                                                                    class="btn btn-danger btn-rounded btn-icon">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </a> --}}
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
