<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class ApiCompanyController extends Controller
{
    /**
     * Show a company details with contacts
     * @param $companyId - ID of a company
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($companyId)
    {
        $company = Company::with('contacts')->where('id', $companyId)->first();
        if (!$company) {
            return response()->json([
                'statut' => 'Cette entreprise n\'existe pas'
            ]);
        }

        return response()->json([
            'company' => $company
        ]);
    }

    public function index(){
        $companies = Company::with('contacts')->get();
        return response()->json([
            'companies' => $companies
        ]);
    }
}
