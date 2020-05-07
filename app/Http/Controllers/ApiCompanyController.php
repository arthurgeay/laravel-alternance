<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class ApiCompanyController extends Controller
{
    public function show($companyId)
    {
        $company = Company::where('id', $companyId)->first();
        if(!$company) {
            return response()->json([
                'statut' => 'Cette entreprise n\'existe pas'
            ]);
        }

        return response()->json([
            'company' => $company
        ]);
    }
}
