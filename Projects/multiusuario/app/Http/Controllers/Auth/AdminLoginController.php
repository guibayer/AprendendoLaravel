<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function login(Request $request){
        //Primeira coisa, verificar se o usuario digitou um usuario e uma senha
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);

        if($authOK){
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }

    public function index(){
        return view('admin_login');
    }
}
