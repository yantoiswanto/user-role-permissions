<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginApiService;

    public function __construct(LoginApiService $loginApiService)
    {
        $this->loginApiService = $loginApiService;
    }

    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);

        // $identity = $request->input('email');
        // $password = $request->input('password');

        // try {
        //     $response = $this->loginApiService->login($identity, $password);
        //     // Proses respons sesuai kebutuhan Anda
        //     return response()->json($response);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }

        if (Auth::guard('web')->attempt(
            ['email' => $request->email, 'password' => $request->password],
            $request->remember
        )) {
            session()->flash('success', 'Successully Logged in !');
            return redirect()->route('dashboard');
        } else {
            // Search using username
            if (Auth::guard('web')->attempt(
                ['username' => $request->email, 'password' => $request->password],
                $request->remember
            )) {
                session()->flash('success', 'Successully Logged in !');
                return redirect()->route('dashboard');
            }
            // error
            session()->flash('error', 'Invalid email and password');
            return back();
        }
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
