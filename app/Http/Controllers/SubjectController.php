<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('pages.subjects.index')->with(['subjects' => $subjects]);
    }

    public function create()
    {
        return view('pages.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
//        dd($data);
        Subject::create($data);

        return redirect()->route('subjects.index');
    }

    public function edit($id)
    {
        $subject = Subject::find($id);

        return view('pages.subjects.edit')->with(['subject' => $subject]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $subject = Subject::find($id);
        $subject->update($data);

        return redirect()->route('subjects.index');
    }

    public function delete($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index');
    }
}
