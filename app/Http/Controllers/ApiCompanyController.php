<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class ApiCompanyController extends Controller
{
    public function index(){
        $companies = Company::all();
        return response()->json([
            'companies' => $companies
        ]);
    }
}
