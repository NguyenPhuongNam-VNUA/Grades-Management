<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;
use App\Exports\GradesExport;
use App\Imports\GradesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use App\Mail\GradeImportNotification;
use Illuminate\Support\Facades\Mail;

class GradesController extends Controller
{
    public function index(): View|Factory|Application
    {
        $grades = Grades::paginate(10);
        return view('pages.grades.index', compact('grades'));
    }

    // public funtion export()
    // {
    //     return Excel::download(new GradesExport, 'grades.xlsx');
    // }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');
        $path = $file->storeAs('public/excel', $file->getClientOriginalName());

        Excel::import(new GradesImport, $path);

        return redirect()->route('grades.index')->with('success', 'Grades imported successfully');
    }

    public function sendScores(Request $request)
    {
//        $grades = Grades::first();
//        Mail::to($grades->student_email)->queue(new GradeImportNotification($grades));
        //dd($grades);
        $rule = [
            'subject_name' => 'required'
        ];
        $mesage = [
            'subject_name.required' => 'Vui lòng nhập tên môn học'
        ];
        $request->validate($rule, $mesage);
        $subject_name = $request->subject_name;

        $grades = Grades::all(); // Lấy tất cả các bản ghi grades
        foreach ($grades as $grade) {
            Mail::to($grade->student_email)->queue(new GradeImportNotification($grade, $subject_name));
        }

        return redirect()->route('grades.index')->with('success', 'Đã bắt đầu gửi điểm cho sinh viên.');
    }

    public function resetGrades()
    {
        Grades::truncate();

        return redirect()->route('grades.index')->with('success', 'Grades reset successfully');
    }
}
