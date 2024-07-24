@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Quản lý lớp học
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="#" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Quản lý lớp học</span>
                    <span class="breadcrumb-item active">Chỉnh sửa lớp học</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <form class="row" action="{{ route('classes.update', ['id' => $class->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-info"></i>
                        Thông tin lớp học
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="col-form-label">
                                    Tên lớp học: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $class->name }}" placeholder="Nhập tên lớp học...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="code" class="col-form-label">
                                    Mã lớp:  <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="code" id="code" value="{{ $class->code }}" placeholder="Nhập mã lớp học...">
                                </div>
                                {{--                            @error('description')--}}
                                {{--                            <label id="error-description" class="validation-error-label text-danger"--}}
                                {{--                                   for="description">{{ $message }}</label>--}}
                                {{--                            @enderror--}}
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
                        <a href="{{ route('classes.index') }}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
