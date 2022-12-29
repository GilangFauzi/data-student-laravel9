<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {

        // todo Remember me
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            $user = auth()->user();
            // dd($user);
            return redirect()->intended('/')->with('message', 'Login Success!');
        } else {
            return back()->with('message', 'Your email and password are wrong.');
        }

        // todo login normal
        // $credentials = $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);


        // if (!Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/')->with('message', 'Login Success!');
        //     // return redirect('/')->with('mes', 'Task Created Successfully!');
        // }

        // Alert::warning('Login failed', 'Enter the password and email correctly');
        // return redirect('/login')->with('message', 'Login Failed!');
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
            'image' => 'image|file|max:1024',
            'password' => 'required',
            'password2' => 'required|same:password'
        ]);
        if ($validasi['role_id'] == 'Open this select role') {
            return redirect('register')->with('message', 'Select Role');
        }

        if ($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('student-images');
        }

        $validasi['password'] = bcrypt($validasi['password']);
        User::create($validasi);

        return redirect('login')->with('register', 'Register has been success');
    }
    public function profile()
    {
        return view('login.profile', [
            'title' => 'My Profile'
        ]);
    }
    public function profileUpdate(User $user, Request $request)
    {
        // $user = Auth::user()->id;
        // dd($user);
        $validate = [
            'name' => 'required',
            'image' => 'file|image|max:1024'
        ];

        if ($request->email != $user->email) {
            $validate['email'] = 'required|email:dns|unique:users';
        }

        $validateData = $request->validate($validate);

        if ($request->file('image')) {
            // * jika gambar lama nya ada ketika yang awalnya kosong di upload gambar baru, jika gambar lama nya ada maka dihapus
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('student-images');
        }
        // dd($validateData);
        $user->update($validateData);
        Alert::success('Congrats', 'Updated has been success');
        return redirect('/profile');
    }

    public function changePassword(User $user, Request $request)
    {
        $validasi = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'newPassword2' => 'required|same:newPassword',
        ]);

        // todo check password
        if (!Hash::check($validasi['oldPassword'], $user->password)) {
            return back()->with("message", "Old Password Doesn't match!");
        }

        // todo Change Password
        User::whereId($user->id)->update([
            'password' => bcrypt($validasi['newPassword'])
        ]);

        // Alert::success('Congrats', 'Change password has been success');
        return redirect('/profile')->with('success', 'Change password has been success');
    }
    public function destroyAccount(User $user, Request $request)
    {
        $validasi = $request->validate([
            'confirmation' => 'required'
        ]);

        if ($user->image) {
            Storage::delete($user->image);
        }
        $user->delete($validasi);
        return redirect('/login')->with('message', 'Account has been deleted!');
    }
}