<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogin;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);

        return redirect()->home();
    }

    public function login()
    {
        return view('user.login');
    }

    public function authLogin(StoreLogin $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            session()->flash('success', 'Авторизация пройдена');
            if (Auth::user()->role == 2 || Auth::user()->role == 3){
                return redirect()->route('admin.index');
            }
            return redirect()->home();
        }

        return redirect()->back()->with('error', 'Неправильный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}
