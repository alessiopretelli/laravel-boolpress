<?php

namespace App\Http\Controllers\Admin;

// use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.home');
    }

    public function profile() {
        // $user = 
        return view('profile');
    }

    public function generate_token() {
        $api_token = Str::random(80);
        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();
        // @dd($api_token);

        return redirect()->route('profile');
    }
}
