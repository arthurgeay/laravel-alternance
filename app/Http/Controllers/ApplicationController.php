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

    public function index()
    {
        $applications = Application::where('user_id', Auth::user()->getAuthIdentifier())->get();
        return view('application.index', compact('applications'));
    }

    public function create()
    {
        $companies = Company::with('contacts')->get();
        return view('application.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => ['required'],
            'contact_id' => ['required'],
            'contact_type' => ['required'],
            'description' => ['required'],
            'state' => ['required'],
        ]);

        $application = new Application();
        $application->company_id = $request->get('company_id');
        $application->contact_id = $request->get('contact_id');
        $application->user_id = Auth::user()->getAuthIdentifier();
        $application->description = $request->get('description');
        $application->contact_type = $request->get('contact_type');
        $application->state = $request->get('state');
        $application->save();

        return redirect()->route('application.home');
    }

    public function edit($applicationId)
    {

        $application =  Application::where('id', $applicationId)->first();
        $companies = Company::with('contacts')->get();
        return view('application.edit', compact(['companies', 'application']));
    }

    public function editStore(Request $request, $applicationId)
    {
        $request->validate([
            'company_id' => ['required'],
            'contact_id' => ['required'],
            'contact_type' => ['required'],
            'description' => ['required'],
            'state' => ['required'],
        ]);

        $application = Application::find($applicationId);

        $application->company_id = $request->get('company_id');
        $application->contact_id = $request->get('contact_id');
        $application->user_id = Auth::user()->getAuthIdentifier();
        $application->description = $request->get('description');
        $application->contact_type = $request->get('contact_type');
        $application->state = $request->get('state');
        $application->save();

        return redirect()->route('application.home');
    }

    public function delete($applicationId)
    {
        $application = Application::find($applicationId);
        $application->delete();

        return redirect()->route('application.home');
    }
}
