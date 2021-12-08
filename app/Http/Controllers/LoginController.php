<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth; // baru

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function proses(Request $request)
    {
        $password = Hash::needsRehash();
        $user = User::find($request->email, $request->password);

    }
    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
