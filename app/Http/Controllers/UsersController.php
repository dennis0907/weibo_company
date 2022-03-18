<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {   //以下頁面不需要認證['show','create','store']
        $this->middleware('auth',[
            'except' => ['show','create','store','index']
        ]);

        //只允許未登入訪問註冊頁面
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }


    public function create() {
        //註冊頁面
        return view('users.create');
    }

    public function show(User $user) {
        //用戶中心
        $this->authorize('update',$user);
        return view('users.show', compact('user'));
    }

    public function store(Request $request) {
        //註冊資料過濾
        $this->validate($request,[
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        //資料庫寫入
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //登入、返回成功訊息
        Auth::login($user);
        session()->flash('success' , '歡迎，你註冊成功!!');
        return redirect()->route('users.show',[$user]);
    }

    //編輯頁面
    public function edit(User $user) {
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request,User $user) {
        //修改資料過濾
        $this->authorize('update',$user);
        $this->validate($request,[
            'name' => 'required|max:50',
            // 'password' => 'required|confirmed|min:6'
            'password' => 'nullable|confirmed|min:6'
        ]);

        // $user->update([
        //     'name' => $request->name,
        //     'password' => bcrypt($request->password)
        // ]);

        //1.密碼是否修改
        //2.資料庫修改
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        //成功
        session()->flash('success','個人資料已更新完成');

        return redirect()->route('users.show',$user->id);
    }

    public function index() {
        //每頁資料數
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }

    public function destroy(User $user) {
        //只有admin權限可以操作
        $this->authorize('destroy',$user);
        //刪除使用者
        $user->delete();
        session()->flash('success','已成功刪除該用戶');
        return back();
    }
}
