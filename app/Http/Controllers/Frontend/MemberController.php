<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class MemberController extends Controller
{
    public function account_edit(string $id)
    {
        $data = User::where('id', $id)->get();
        return view('frontend/member/account/update', compact('data'));
    }

    public function account_update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();

        $file = $request->avatar;
        if(!empty($file)){
            $data['avatar'] = $file->getClientOriginalName();
        }
        

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }


        if ($user->update($data)) {
            if(!empty($file)){
                $file->move('upload/user/avatar', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
    }

    public function list()
    {
        $data = Product::get();
        $data = $data->sortBy('product')->take(6);

        // $data=DB::table('product')->get()->toArray();
        return view('frontend/member/account/list', compact('data'));
    }

    public function getLogin()
    {
        return view('frontend/member/login');
    }

    public function postLogin(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];

        $remember = false;

        if($request->remember_me){
            $remember = true;
        }

        if(Auth::attempt($login, $remember)){
            return redirect('frontend/index');
        }else{
            return redirect()->back()->withErrors('Email or password is not correct.');
        };
    }

    public function logout()
    {
        Auth::logout();
        return redirect('frontend/login');    
    }

    public function add()
    {
        return view('frontend/member/register');
    }

    public function insert(Request $request)
    {      
        $data = $request->all();
        
        $data['level'] = 0;


        if(User::create($data)){
            echo 'thanh cong';
        }else{
            echo 'that bai';
        }
    }

}
