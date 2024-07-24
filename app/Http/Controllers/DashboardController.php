<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradesHistory;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $history = GradesHistory::all();
        $classes = Classes::all();
        $subjects = Subject::all();
        $lecturers = User::all();
        return view('pages.dashboard.index')->with([
            'history' => $history,
            'classes' => $classes,
            'subjects' => $subjects,
            'lecturers' => $lecturers
        ]);
    }
}
