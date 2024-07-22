@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Quản lý điểm
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="#" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Quản lý giảng viên</span>
                    <span class="breadcrumb-item active">Chỉnh sửa thông tin</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <form class="row" action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-info"></i>
                        Thông tin giảng viên
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="lecturer_code" class="col-form-label">
                                    Mã giảng viên: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="lecturer_code" id="lecturer_id" value="{{ $user->lecturer_code }}" placeholder="Nhập mã giảng viên...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="fullname" class="col-form-label">
                                    Họ và tên: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" placeholder="Nhập họ và tên...">
                                </div>
                                {{--                            @error('description')--}}
                                {{--                            <label id="error-description" class="validation-error-label text-danger"--}}
                                {{--                                   for="description">{{ $message }}</label>--}}
                                {{--                            @enderror--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="email" class="col-form-label">
                                    Email: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" placeholder="Nhập email...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="phone_number" class="col-form-label">
                                    Số điện thoại: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" placeholder="Nhập số diện thoại...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="address" class="col-form-label">
                                    Địa chỉ: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="address" id="address" value="{{ $user->address }}" placeholder="Nhập địa chỉ...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-gear-six"></i>
                        Hành động
                    </div>
                    <div class="card-body d-flex align-items-center gap-1">
                        <button class="btn btn-primary" type="submit"><i class="ph-floppy-disk"></i> Chỉnh sửa</button>
                        <a href="{{ route('users.index') }}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
