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
                    <span class="breadcrumb-item active">Quản lý điểm</span>
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
                                        <form action="{{ route('grades.sendScores') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Gửi điểm</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="content-action">
                                <form action="{{ route('grades.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex">
                                        <input type="file" name="file" required>
                                        <button type="submit" class="btn btn-teal"><i class="ph-plus-circle me-1"></i> Thêm tệp</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="content-header d-flex justify-content-between align-items-end">
                            <form action="{{ route('grades.reset') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Làm mới</button>
                            </form>
                        </div>
                        <div class="content-table">
                            <table class="table-bordered table table-responsive">
                                <thead>
                                <tr>
                                    <th class="text-center" width="4%">#</th>
                                    <th class="text-center">Họ và tên</th>
                                    <th class="text-center">Mã SV</th>
                                    <th class="text-center">Điểm chuyên cần</th>
                                    <th class="text-center">Điểm giữa kì</th>
                                    <th class="text-center">Điểm cuối kì</th>
                                    <th class="text-center">Điểm trung bình</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($grades as $grade)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $grade->student_fullname }}</td>
                                        <td>{{ $grade->student_code }}</td>
                                        <td>{{ $grade->attendance_score }}</td>
                                        <td>{{ $grade->midterm_score }}</td>
                                        <td>{{ $grade->final_score }}</td>
                                        <td>{{ $grade->average_of_subject }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                             <div class="d-flex justify-content-end align-items-center w-100 mt-3">
                                <div class="pagination">
                                    {{ $grades->appends(request()->input())->links() }}
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
