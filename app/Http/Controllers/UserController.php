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

    /**
     * Show all users with pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::withCount('applications')->simplePaginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Delete a user
     * @param $userId - Id of a user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($userId)
    {
        $user = User::find($userId);
        $user->delete();

        return redirect()->route('user.index');
    }
}
