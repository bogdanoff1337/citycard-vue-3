<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string|unique:users',
            'login' => 'required|string|unique:users',
            'password' => 'required|string',
            'role' => 'required|in:user,admin',
        ]);
    
        // Перевірка наявності користувача перед створенням
        $existingUser = User::where('phone', $data['phone'])->orWhere('login', $data['login'])->first();
        if ($existingUser) {
            return response()->json([
                'success' => false,
                'message' => 'Користувач з таким телефоном або логіном вже існує',
            ]);
        }
    
        $user = new User();
        $user->phone = $data['phone'];
        $user->login = $data['login'];
        $user->password = bcrypt($data['password']);
        $user->role = $data['role'];
    
        $user->save();


        Session::put('user', $user);
        
    
        return response()->json([
            'success' => true,
            'message' => 'Користувач успішно зареєстрований',
            'user' => $user,
        ]);
    }
    


    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->role, // Додаємо роль користувача у відповідь
            ],
            ]);
        } else {
            return response()->json([
                'error' => 'Invalid phone or password',
            ], 401);
        }
    }

    public function checkAuth()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'authenticated' => true,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'authenticated' => false,
                'user' => null,
            ]);
        }
    }


    

    public function logout(Request $request)
    {
        // Видаляємо користувача з сесії
        Auth::logout();
    
        // Видаляємо дані сесії
        $request->session()->invalidate();
    
        // Перенаправляємо користувача на головну сторінку або іншу сторінку
        return redirect('/');
    }



    public function isLoggedIn()
    {
    $user = Auth::user();

    return $user ? true : false;
    }

   

}
