@extends('layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Quản lý môn học
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="#" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Quản lý môn học</span>
                    <span class="breadcrumb-item active">Thêm mới môn học</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <form class="row" action="{{ route('subjects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header bold">
                        <i class="ph-info"></i>
                        Thông tin môn học
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="col-form-label">
                                    Tên môn học: <span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nhập tên môn học...">
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
                        <button class="btn btn-primary" type="submit"><i class="ph-floppy-disk"></i>Tạo mới</button>
                        <a href="{{ route('subjects.index') }}" type="button" class="btn btn-warning"><i class="ph-arrow-counter-clockwise"></i> Trở lại</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
