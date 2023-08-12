<?php

namespace App\Http\Controllers;

use App\Models\AAC;
use App\Models\Bordereau;
use App\Models\CFAD;
use App\Models\Entreprises;
use App\Models\Essences;
use App\Models\LigneBordereau;
use App\Models\UFG;
use App\Models\User;
use App\Models\Vehicules;
use Illuminate\Http\Request;

class BordereauController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bordereau = Bordereau::all();
        $ligneBordereau = LigneBordereau::all();
        $entreprises = Entreprises::all();
        $vehicules = Vehicules::all();
        $agents = User::all();
        $cfad = CFAD::all();
        $ufg = UFG::all();
        $aac = AAC::all();
        $essences = Essences::all();

        $this->data = [
            'bordereau' => $bordereau,
            'entreprises' => $entreprises,
            'vehicules' => $vehicules,
            'agents' => $agents,
            'cfad' => $cfad,
            'ufg' => $ufg,
            'aac' => $aac,
            'essences' => $essences,
            'ligneBordereau' => $ligneBordereau,
        ];
        return \response()->json($this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $find = Bordereau::where('num_bord', $request->num_bord)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce numero bordereau existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        $bordereau = Bordereau::create($request->all())->id;

        foreach ($request->trees as $key) {
            LigneBordereau::create([
                'numero' => $key['numero'],
                'volume' => $key['volume'],
                'essenceID' => $key['essenceID'],
                'bordereauID' => $bordereau,
                'aacID' => $key['aacID'],
            ]);
        }


        $this->data = [
            'code' => 0,
            'message' => 'Enregistrement effectué',
            'data' => [
                'bordereauID' => $bordereau
            ]
        ];
        return \response()->json($this->data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bordereau = Bordereau::find($id);

        $find = Bordereau::where('num_bord', '!=', $bordereau->num_bord)->where('num_bord', $request->num_bord)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce bordereau existe deja',
            ];
            return \response()->json($this->data);
        }

        $bordereau->fill($request->all());
        $bordereau->save();

        $this->data = [
            'code' => 0,
            'message' => 'Enregistrement effectué',
        ];
        return \response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bordereau = Bordereau::find($id);
        $bordereau->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
        ];
        return \response()->json($this->data);
    }
}
