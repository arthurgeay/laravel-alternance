<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Application;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $badge = Application::where('user_id', Auth::user()->getAuthIdentifier())->count();
        return view('home', compact('drunk'), compact('badge'));
    }

    public function alcohol(Request $request){
        $user = Auth::user();
        $user->alcohol = $request->get('newAlcohol');
        $user->save();

        return redirect()->route('home');
    }
}
