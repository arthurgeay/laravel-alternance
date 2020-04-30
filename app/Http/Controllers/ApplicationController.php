<?php

namespace App\Http\Controllers;

use App\Application;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
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

    public function create()
    {
        $companies = Company::with('contacts')->get();
        return view('application.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $application = new Application();
        $application->company_id = $request->get('company_id');
        $application->contact_id = $request->get('contact_id');
        $application->user_id = Auth::user()->getAuthIdentifier();
        $application->description = $request->get('description');
        $application->contact_type = $request->get('contact_type');
        $application->state = $request->get('state');
        $application->save();

        return redirect()->route('company.home');
    }
}
