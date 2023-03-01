<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ViewAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', 'Password Tidak Sama');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Register Success');
    }

    public function login(Request $request)
    {

        // validator
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        // if ($validator->fails()) {
        //     return response($validator->errors());
        // }

        // ambil data user
        $user = User::where('email', $request->email)->firstOrFail();

        // if (!$token = Auth::guard('api')->attempt($request->only('email', 'password'))) {
        //     return response()->json([
        //         'message' => 'Email atau Password Salah'
        //     ], 401);
        // }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->with('errors', 'Email Atau Password Salah');

        // return response()->json([
        //     'message' => 'Berhasil Login',
        //     'data' => $user,
        //     'token' => $token,
        // ], 201);
    }

    public function logout(Request $request)
    {
        // JWTAuth::invalidate(JWTAuth::getToken());

        // return response()->json([
        //     'message' => 'Berhasil Logout'
        // ], 200);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
