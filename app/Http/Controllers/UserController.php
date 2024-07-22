<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id','!=',1)->paginate(10);

//        dd($users);
        return view('pages.users.index')->with(['users' => $users]);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'fullname' => 'required',
            'email' => 'required|email',
            'lecturer_code' => 'required',
        ];

        $message = [
            'fullname.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng  dạng',
            'lecturer_code.required' => 'Mã giảng viên không được để trống',
        ];
//        dd($request->all());

        $request->validate($rule, $message);

        $data = $request->all();
        $data['role_id'] = 2;

//        dd($data);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Thêm mới người dùng thành công');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'fullname' => 'required',
            'email' => 'required|email',
            'lecturer_code' => 'required',
        ];

        $message = [
            'fullname.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng  dạng',
            'lecturer_code.required' => 'Mã giảng viên không được để trống',
        ];
        $request->validate($rule, $message);

        $user = User::find($id);
        $data = $request->all();

        $user->update($data);

//        dd($user);
        return redirect()->route('users.index')->with('success', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa người dùng thành công');
    }
}
