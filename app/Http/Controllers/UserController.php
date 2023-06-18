<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }

    
    public function index()
    {
        $this->authorize('roleAdmin', $this->user);
        $user = User::all();
        $data = compact('user');
        return view('user.index',$data);
    }

    public function create()
    {
        $this->authorize('roleAdmin', $this->user);
        $user=User::all();
        $data['title'] = 'User';
        return view('user.create',$data);
    }

    public function store(Request $request)
    {
        $this->authorize('roleAdmin', $this->user);
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password),
        ]);

        return redirect('user');
    }

    public function edit($id)
    {
        $this->authorize('roleAdmin', $this->user);
        $data['title'] = 'User';
        $user = User::find($id);
        return view('user.edit', ['user' => $user], $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('roleAdmin', $this->user);
        $data = $request->all();
        $user = User::find($id);
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required'
        ]);
        $user->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'level' => $data['level'],
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('roleAdmin', $this->user);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }


    public function register()
    {
        $this->authorize('roleAdmin', $this->user);
        $data['title'] = 'Register';
        return view('register', $data);
    }

    public function register_action(Request $request)
    {
        $this->authorize('roleAdmin', $this->user);
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);


        $user = new User([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        return view('password', $data);
    }

    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password changed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('http://127.0.0.1:8000/');
    }
}