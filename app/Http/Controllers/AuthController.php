<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('user\login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landingpage');
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Cek role user dan arahkan ke halaman yang sesuai
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard'); // Arahkan admin ke dashboard.blade.php
                } else {
                    return redirect()->route('courses.index'); // Arahkan student ke index.blade.php
                }
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function register()
    {

        return view('user\register');
    }

    public function processRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        if ($validator->passes()){
            $user = new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->role='student';
            $user->save();

            // Pesan yang mengarahkan pengguna untuk login dan mengambil kuis
            return redirect()->route('account.login')->with('success', 'You have registered successfully.');
        }else{
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }

}
