<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Application;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::All();
        $user = User::find($request->get('userId'));
        $badge = Application::where('user_id', Auth::user()->getAuthIdentifier())->count();
        return view('user.index', compact('users'), compact('badge'));
    }
}
