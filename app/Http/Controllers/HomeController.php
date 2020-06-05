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
     * Show page of profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $badge = Application::where('user_id', Auth::user()->getAuthIdentifier())->count();
        return view('home', compact('badge'));
    }

    /**
     * Store in db if the user drinks or not
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function alcohol(Request $request){
        $user = Auth::user();
        $user->alcohol = $request->get('newAlcohol');
        $user->save();

        return redirect()->route('home');
    }
}
