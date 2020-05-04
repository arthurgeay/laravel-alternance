<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Application;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        $badge = Application::where('user_id', Auth::user()->getAuthIdentifier())->count();
        return view('user.index', compact('users'), compact('badge'));
    }
}
