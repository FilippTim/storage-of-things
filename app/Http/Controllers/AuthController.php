<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth/signup');
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:App\Models\User',
            'password'=>'required|min:6'
        ]);

        // Создание пользователя
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Перенаправление на страницу логина с уведомлением об успешной регистрации
        return redirect('/login')->with('success', 'Вы успешно зарегистрировались! Теперь вы можете войти.');
    }
    // Отображение формы логина
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Обработка данных аутентификации
    public function login(Request $request)
    {
       // Валидация данных
       $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
        if (Auth::attempt($request->only('email', 'password'))){
            return redirect('/')->with('success', 'Вы вошли в систему!');
        }
        return back()->withErrors([
            'email' => 'Неверные учетные данные.',
        ]);

    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Вы вышли из системы.');
    }
}
