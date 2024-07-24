<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::paginate(10);
        return view('pages.classes.index')->with(['classes' => $classes]);
    }

    public function create()
    {
        return view('pages.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $data = $request->all();
//        dd($data);

        Classes::create($data);

        return redirect()->route('classes.index');
    }

    public function edit($id)
    {
        $class = Classes::find($id);

        return view('pages.classes.edit')->with(['class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

       $data = $request->all();
       $class = Classes::find($id);
//       dd($class);
       $class->update($data);
//       dd($class);
       return redirect()->route('classes.index');
    }

    public function delete($id)
    {
        $class = Classes::find($id);

        $class->delete();

        return redirect()->route('classes.index');
    }
}
