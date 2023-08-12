<?php

namespace App\Http\Controllers;

use App\Models\Entreprises;
use App\Models\Vehicules;
use Illuminate\Http\Request;

class VehiculesController extends Controller
{

    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicules::join('entreprises', 'vehicules.entrepriseID', '=', 'entreprises.id')->get(['vehicules.*', 'entreprises.raison']);
        return \response()->json($vehicules);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entreprises = Entreprises::all();
        return \response()->json($entreprises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $find = Vehicules::where('matricule', $request->matricule)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce matricule existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        Vehicules::create($request->all());

        $this->data = [
            'code' => 0,
            'message' => 'Enregistrement effectué'
        ];
        return \response()->json($this->data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicules = Vehicules::find($id);
        $this->data = [
            'code' => 0,
            'message' => 'affichage des informations',
            'data' => $vehicules
        ];
        return \response()->json($this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicules = Vehicules::find($id);
        $this->data = [
            'code' => 0,
            'message' => 'affichage des informations',
            'data' => $vehicules
        ];
        return \response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicules = Vehicules::find($id);

        $find = Vehicules::where('raison', '!=', $vehicules->matricule)->where('raison', $request->matricule)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce matricule existe deja',
            ];
            return \response()->json($this->data);
        }

        $vehicules->fill($request->all());
        $vehicules->save();


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
        $vehicules = Vehicules::find($id);
        $vehicules->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
