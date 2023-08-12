<?php

namespace App\Http\Controllers;

use App\Models\AAC;
use App\Models\Bordereau;
use App\Models\CFAD;
use App\Models\Entreprises;
use App\Models\UFG;
use App\Models\User;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        $data = [];
        $enterprises = Entreprises::count();
        $bordereau = Bordereau::all();
        $cfad = CFAD::count();
        $ufg = UFG::count();
        $aac = AAC::count();
        $users = User::count();

        $data = [
            'enterprises' => $enterprises,
            'bordereau' => $bordereau,
            'cfad' => $cfad,
            'ufg' => $ufg,
            'aac' => $aac,
            'users' => $users,
        ];

        return response()->json($data);
    }
}
