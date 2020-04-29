<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

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

    public function index()
    {
        $companies = Company::All();

        return view('company.index', compact('companies'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->get('name');
        $company->area_activity = $request->get('area_activity');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        $company->save();

        return redirect()->route('company.home');

    }

    public function show($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        $contacts = $company->contacts;

        return view('company.show', compact(['company', 'contacts']));
    }

    public function edit($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        return view('company.edit', compact('company'));
    }

    public function editStore(Request $request, $companyId)
    {
        $company = Company::find($companyId);
        $company->name = $request->get('name');
        $company->area_activity = $request->get('area_activity');
        $company->address = $request->get('address');
        $company->email = $request->get('email');
        $company->phone = $request->get('phone');
        $company->save();

        return redirect()->route('company.show', ['id' => $company->id ]);

    }

    public function delete($companyId)
    {
        $company = Company::find($companyId);
        $company->delete();

        return redirect()->route('company.home');
    }
}
