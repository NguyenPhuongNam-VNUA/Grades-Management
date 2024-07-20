<?php

namespace App\Http\Controllers;

use App\Mail\VeryfyAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login.index');
    }

    public function login(Request $request)
    {
        $adminLogin = $request->has('username') && $request->has('password');
        $lecturerLogin = $request->has('lecturer_code');

        if ($adminLogin) {
            $rule = [
                'username' => 'required',
                'password' => 'required'
            ];

            $message = [
                'username.required' => 'Tài khoản không được để trống',
                'password.required' => 'Mật khẩu không được để trống'
            ];

            $request->validate($rule, $message);
            $credentials = $request->only('username', 'password');

            if (auth()->attempt($credentials)) {
                // dd(auth()->user());
                return redirect()->route('dashboard');
            }

            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }

        if ($lecturerLogin) {
            $rule = [
                'lecturer_code' => 'required',
            ];

            $message = [
                'lecturer_code.required' => 'Mã giảng viên không được để trống',
            ];

            $request->validate($rule, $message);
            $lecture_code = $request->input('lecturer_code');

            //dd($lecture_code);
            $lecturer = User::where('lecturer_code', $lecture_code)->first();

            if ($lecturer) {
                $token = Str::random(60);
                //dd($token);
                $lecturer->verify_token = $token;
                $lecturer->save();
                //dd($lecturer);
                Mail::to($lecturer->email)->send(new VeryfyAccount($lecturer, $token));
                return redirect()->route('login.show')->with('success', 'Vui lòng kiểm tra email để xác thực tài khoản');
            }

            return redirect()->back()->with('error', 'Mã giảng viên không tồn tại');
        }

        return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');
    }

    public function verify($token)
    {
        $lecture = User::where('verify_token', $token)->firstOrFail();
        // dd($lecture);
        User::where('verify_token', $token)->update([
            'verify_token' => null
        ]);

        auth()->login($lecture);
        return redirect()->route('dashboard');
    }
}
