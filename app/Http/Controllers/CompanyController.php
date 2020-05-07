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

    public function index()
    {
        $companies = Company::simplePaginate(10);

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
