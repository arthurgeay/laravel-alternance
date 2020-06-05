<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
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
     * Show all companies with pagination
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companies = Company::simplePaginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Create a new company
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a new company
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'area_activity' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
        ]);

        $company = new Company();
        $company->name = $request->get('name');
        $company->area_activity = $request->get('area_activity');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        $company->img = $request->get('imgLink');
        $company->save();

        return redirect()->route('company.home');

    }

    /**
     * Show a company
     * @param $companyId - Id of a company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        $contacts = $company->contacts;

        return view('company.show', compact(['company', 'contacts']));
    }

    /**
     * Edit a company
     * @param $companyId - Id of a company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        return view('company.edit', compact('company'));
    }

    /**
     * Store an edited company
     * @param Request $request
     * @param $companyId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editStore(Request $request, $companyId)
    {
        $request->validate([
            'name' => ['required'],
            'area_activity' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
        ]);

        $company = Company::find($companyId);
        $company->name = $request->get('name');
        $company->area_activity = $request->get('area_activity');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        if ($request->get('imgLink') != ""){
            $company->img = $request->get('imgLink');
        }
        $company->save();

        return redirect()->route('company.show', ['id' => $company->id ]);

    }

    /**
     * Delete a company
     * @param $companyId - Id of a company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($companyId)
    {
        $company = Company::find($companyId);
        $company->delete();

        return redirect()->route('company.home');
    }
}
