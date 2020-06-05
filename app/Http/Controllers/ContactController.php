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

    /**
     * Ceate a contact
     * @param $companyId - Id of a company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($companyId){
        $company = Company::where('id', $companyId)->first();
        return view('contact.create', compact('company'));
    }

    /**
     * Store a new contact
     * @param Request $request
     * @param $companyId - Id of a company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $companyId)
    {
        $request->validate([
            'fullname' => ['required'],
            'jobname' => ['required'],
            'mail' => ['required', 'email'],
            'phone' => ['required'],
        ]);

        $contact = new Contact();
        $contact->fullname = $request->get('fullname');
        $contact->jobname = $request->get('jobname');
        $contact->mail = $request->get('mail');
        $contact->phone = $request->get('phone');
        $contact->company_id = $companyId;
        $contact->save();

        return redirect()->route('company.show', ['id' => $companyId]);
    }

    /**
     * Edit contact
     * @param $contactId - Id of a contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($contactId)
    {
        $contact = Contact::where('id', $contactId)->first();
        return view('contact.edit', compact('contact'));
    }

    /**
     * Store an edited contact
     * @param Request $request
     * @param $contactId - Id of a contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editStore(Request $request, $contactId)
    {
        $request->validate([
            'fullname' => ['required'],
            'jobname' => ['required'],
            'mail' => ['required', 'email'],
            'phone' => ['required'],
        ]);

        $contact = Contact::find($contactId);
        $company = $contact->company;

        $contact->fullname = $request->get('fullname');
        $contact->jobname = $request->get('jobname');
        $contact->phone = $request->get('phone');
        $contact->mail = $request->get('mail');
        $contact->save();

        return redirect()->route('company.show', ['id' => $company->id]);
    }

    /**
     * Delete a contact
     * @param $contactId - Id of a contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($contactId)
    {
        $contact = Contact::find($contactId);
        $company = $contact->company;
        $contact->delete();

        return redirect()->route('company.show', ['id' => $company->id]);
    }

}
