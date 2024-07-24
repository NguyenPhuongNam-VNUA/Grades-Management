<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradesHistory;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Grades;
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
        $classes = Classes::all();
        $subjects = Subject::all();
        return view('pages.grades.index', compact('grades', 'classes', 'subjects'));
    }

    public function import(Request $request)
    {
        $classes = Classes::pluck('id')->toArray();
        $subjects = Subject::pluck('id')->toArray();

        $classesString = implode(',', $classes);
//        dd($classesString);
        $subjectsString = implode(',', $subjects);

//        dd($request->all(), $subjectsString, $classesString);

        $rule = [
            'subject' => 'required|in:'.$subjectsString,
            'file' => 'required|:mimesxlsx',
            'class' => 'required|in:'.$classesString,
        ];
        $mesage = [
            'subject.required' => 'Vui lòng chọn tên môn học',
            'class.required' => 'Vui lòng chọn tên lớp học',
            'file.required' => 'Vui lòng chọn file',
        ];
        $request->validate($rule, $mesage);

//        dd($request->class);

        $file = $request->file('file');
        $path = $file->storeAs('public/excel', $file->getClientOriginalName());

        Excel::import(new GradesImport($request->class, $request->subject), $path);

        return redirect()->route('grades.index')->with([
            'success'=>'Grades imported successfully']);
    }

    public function sendScores(Request $request)
    {
//        $grades = Grades::first();
//        Mail::to($grades->student_email)->queue(new GradeImportNotification($grades));
        //dd($grades);

        $grades = Grades::all(); // Lấy tất cả các bản ghi grades
//        dd($grades);
        $class = $grades->pluck('class_id')->first();
        $subject = $grades->pluck('subject_id')->first();

        foreach ($grades as $grade) {
            Mail::to($grade->student_email)->queue(new GradeImportNotification($grade));
        }

        $history = GradesHistory::create([
            'class_id' => $class,
            'subject_id' => $subject,
            'lecturer_id' => auth()->user()->id,
            'date' => now()->setTimezone('Asia/Ho_Chi_Minh'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Đã bắt đầu gửi điểm cho sinh viên.');
    }

    public function resetGrades()
    {
        Grades::truncate();

        return redirect()->route('grades.index')->with('success', 'Grades reset successfully');
    }
}
