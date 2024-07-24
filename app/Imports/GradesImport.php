<?php

namespace App\Imports;

use App\Models\Grades;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

class GradesImport implements ToModel, WithHeadingRow
{
    private $class_id;
    private $subject_id;
    public function __construct($class_id, $subject_id)
    {
        $this->class_id = $class_id;
        $this->subject_id = $subject_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grades([
            'lecturer_id' => auth()->user()->id,
            'student_code' => $row['masv'],
            'student_email' => $row['masv'] . '@sv.vnua.edu.vn',
            'class_id' => $this->class_id,
            'subject_id' => $this->subject_id,
            'student_fullname' => $row['hvt'],
            'attendance_score' => $row['cc'],
            'midterm_score' => $row['gk'],
            'final_score' => $row['ck'],
            'average_of_subject' => $row['cc']*0.1 + $row['gk']*0.3 + $row['ck']*0.6,
        ]);
    }
}
