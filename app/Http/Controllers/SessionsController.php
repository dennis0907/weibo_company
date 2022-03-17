<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        //只允許未登入訪未登入頁面
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    //登入頁面
    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request) {

        //登入資料過濾
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        //通過驗證、記住我
        if (Auth::attempt($credentials,$request->has('remember'))) {
            session()->flash('success','歡迎回來!');
            $fallback = route('users.show',Auth::user());
            return redirect()->intended($fallback);
        } else {
            //驗證失敗
            session()->flash('danger','抱歉您的郵件或密碼有誤');
            return redirect()->back()->withInput();
        }
    }
    // public function store(Request $request) {

    //     $credentials = $this->validate($request,[
    //         'email' => 'required|email|max:255',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         session()->flash('success','歡迎回來!');
    //         return redirect()->route('users.show',[Auth::user()]);
    //     } else {
    //         session()->flash('danger','抱歉您的郵件或密碼有誤');
    //         return redirect()->back()->withInput();
    //     }
    // }

    //登出
    public function destroy() {
        Auth::logout();
        session()->flash('success','您已成功登出!');
        return redirect('login');
    }
}
