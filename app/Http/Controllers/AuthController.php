<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Login Success!');
            // return redirect('/')->with('mes', 'Task Created Successfully!');
        }
        Alert::warning('Login failed', 'Enter the password and email correctly');
        return redirect('/login')->with('message', 'Login Failed!');
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Alert::success('Info Title', 'Info Message');
        Alert::toast('Logout Success', 'Toast Type');

        return redirect('/login')->with('logout', 'Logout success');
    }

    public function register()
    {
        // $role = RoleModel::select('name')->get();
        // $roles = User::with('role')->get();
        $role = RoleModel::all();
        // foreach ($roles as $r) {
        //     dd($r->role->name);
        // }
        // dd($roles);
        return view('login.register', [
            // 'roles' => $roles,
            'dataRole' => $role,
        ]);
    }
    public function storeRegistrasi(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email:dns|unique:users',
            'role_id' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password'
        ]);
        if ($validasi['role_id'] == 'Open this select role') {
            return redirect('register')->with('message', 'Select Role');
        }

        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);

        return redirect('login')->with('register', 'Register has been success');
    }
}