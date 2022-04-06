<?php

namespace App\Http\Controllers;

use App\Actions\User\UserFrontShowAction;
use App\Http\Requests\StoreForgot;
use App\Http\Requests\StoreLogin;
use App\Http\Requests\StoreResetUpdate;
use App\Http\Requests\StoreUser;
use App\Models\Recipe;
use App\Models\User;
use App\Repositories\UsersRepository;
use Dflydev\DotAccessData\Data;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = UsersRepository::usersWithAccessAndPostRecipe();
        return view('front.author.index', compact('users'));
    }

    public function show(int $id, UserFrontShowAction $action)
    {
        return view('front.author.show', $action->execute($id));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreUser $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);
        return response()->json('Аккаунт успешно создан', 200);
    }

    public function login()
    {
        return view('user.login');
    }

    public function authLogin(StoreLogin $request)
    {
        if (Auth::attempt($request->validated())){
            if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
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

    public function forgot()
    {
        return view('user.forgot');
    }

    public function forgotStore(StoreForgot $request)
    {
        $status = Password::sendResetLink($request->email);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request, string $token)
    {
        return view('user.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function resetUpdate(StoreResetUpdate $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
