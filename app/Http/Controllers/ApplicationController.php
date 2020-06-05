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

    /**
     * Return applications of user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $applications = Application::where('user_id', Auth::user()->getAuthIdentifier())->get();
        return view('application.index', compact('applications'));
    }

    /**
     * Create a new application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companies = Company::with('contacts')->get();
        return view('application.create', compact('companies'));
    }

    /**
     * Store in database the new application
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Edit an appplication
     * @param $applicationId - Id of application
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($applicationId)
    {

        $application =  Application::where('id', $applicationId)->first();
        $companies = Company::with('contacts')->get();
        return view('application.edit', compact(['companies', 'application']));
    }

    /**
     * Store an edited application
     * @param Request $request
     * @param $applicationId
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Delete an application
     * @param $applicationId - Id of application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($applicationId)
    {
        $application = Application::find($applicationId);
        $application->delete();

        return redirect()->route('application.home');
    }
}
