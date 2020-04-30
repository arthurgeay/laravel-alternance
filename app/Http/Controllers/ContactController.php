<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
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

    public function create($companyId){
        $company = Company::where('id', $companyId)->first();
        return view('contact.create', compact('company'));
    }

    public function store(Request $request, $companyId)
    {
        $contact = new Contact();
        $contact->fullname = $request->get('fullname');
        $contact->jobname = $request->get('jobname');
        $contact->mail = $request->get('mail');
        $contact->phone = $request->get('phone');
        $contact->company_id = $companyId;
        $contact->save();

        return redirect()->route('company.show', ['id' => $companyId]);
    }

    public function edit($contactId)
    {
        $contact = Contact::where('id', $contactId)->first();
        return view('contact.edit', compact('contact'));
    }

    public function editStore(Request $request, $contactId)
    {
        $contact = Contact::find($contactId);
        $company = $contact->company;

        $contact->fullname = $request->get('fullname');
        $contact->jobname = $request->get('jobname');
        $contact->phone = $request->get('phone');
        $contact->mail = $request->get('mail');
        $contact->save();

        return redirect()->route('company.show', ['id' => $company->id]);
    }

    public function delete($contactId)
    {
        $contact = Contact::find($contactId);
        $company = $contact->company;
        $contact->delete();

        return redirect()->route('company.show', ['id' => $company->id]);
    }

}
