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
                        <h5 class="card-title">Lịch sử gửi điểm</h5>
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Lớp học</th>
                                <th>Môn học</th>
                                <th>Người phụ trách</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($classes->firstWhere('id', $item->class_id))->code }}</td>
                                        <td>{{ optional($subjects->firstWhere('id', $item->subject_id))->name }}</td>
                                        <td>{{ optional($lecturers->firstWhere('id', $item->lecturer_id))->fullname }}</td>
                                        <td>{{ $item->date }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->

    </div>
@endsection
