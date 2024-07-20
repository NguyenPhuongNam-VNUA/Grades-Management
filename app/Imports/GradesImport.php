<?php

namespace App\Imports;

use App\Models\Grades;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

class GradesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grades([
            'lecturer_id' => 1, //q; sao tôi bị lỗi "SQLSTATE[HY000]: General error: 1364 Field 'lecturer_id' doesn't have a default value" khi chạy v
            //a: Để tránh lỗi này, bạn cần thêm giá trị cho trường lecturer_id trong mảng $row. Ví dụ: 
            // 'lecturer_id' => auth()->user()->id, // Assuming the lecturer is the authenticated user
            'class_id' => 1, // Chỉnh sửa hoặc nhận giá trị từ file Excel
            'subject_id' => 1, // Chỉnh sửa hoặc nhận giá trị từ file Excel
            'student_code' => $row['masv'],
            'student_email' => $row['masv'] . '@sv.vnua.edu.vn',
            'student_fullname' => $row['hvt'],
            'attendance_score' => $row['cc'],
            'midterm_score' => $row['gk'],
            'final_score' => $row['ck'],
            'average_of_subject' => $row['cc']*0.1 + $row['gk']*0.3 + $row['ck']*0.6,
            // 'rank' => $this->calculateRank($row['tb']),
            'rank' => 'A',
        ]);
    }
}