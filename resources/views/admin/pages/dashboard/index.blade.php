@extends('admin.layouts.master')

@section('page-header')
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Dashboard
                </h4>
            </div>

        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="#" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Content -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between align-items-end">
                            <div class="content-filter w-50">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <form action="" method="get" id="form-search">
                                            @csrf
                                            <div class="form-group">
                                                <label for="user-search-input">Tìm kiếm</label>
                                                <div class="form-control-feedback form-control-feedback-end">
                                                    <input type="text" name="q" value="{{ request()->query('q') }}"
                                                           placeholder="Nhập từ khoá để tìm kiếm..."
                                                           class="form-control" id="user-search-input">
                                                    <div class="form-control-feedback-icon">
                                                        <i class="ph-magnifying-glass"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="content-action">
                                <a href="" class="btn btn-teal"><i
                                        class="ph-plus-circle me-1"></i> Tạo mới</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="content-table">
                            <table class="table-bordered table table-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center" width="4%">#</th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center" width="10%"></th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach()--}}
{{--                                    <tr>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td></td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <a href="#" class="text-body" data-bs-toggle="dropdown">--}}
{{--                                                    <i class="ph-list"></i>--}}
{{--                                                </a>--}}
{{--                                                <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    <a href="#" class="dropdown-item">--}}
{{--                                                        <i class="ph-pencil me-2"></i>--}}
{{--                                                        Chỉnh sửa--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center align-items-center w-100 mt-3">

                                <div class="pagination">
                                    {{--                                    {{ $faculties->appends(request()->input())->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->

    </div>
@endsection
