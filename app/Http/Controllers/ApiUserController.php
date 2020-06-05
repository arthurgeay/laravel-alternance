<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiUserController extends Controller
{
    /**
     * Show user informations with applications
     * @param $userId - ID of a user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($userId){
        $user = User::with('applications')->where('id', $userId)->first();
        if (!$user) {
            return response()->json([
                'statut' => 'Cet utilisateur n\'existe pas !'
            ]);
        }

        return response()->json([
            'user' => $user
        ]);
    }
}
