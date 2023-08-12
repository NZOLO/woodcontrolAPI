<?php

namespace App\Http\Controllers;

use App\Models\Employes;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employes::leftJoin('entreprises', 'employes.entrepriseID', '=', 'entreprises.id')->get(['employes.*', 'entreprises.raison']);
        return \response()->json($employes);
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
        $find = Employes::where('date', $request->date)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Vous avez deja fait un enregistrement a cette date'
            ];

            return \response()->json($this->data);
        }

        Employes::create([
            'date' => $request->date,
            'nombre' => $request->nombre,
            'gabonais' => $request->gabonais,
            'expat' => $request->expat,
            'femmes' => $request->femmes,
            'hommes' => $request->hommes,
            'tempgabonais' => $request->tempgabonais,
            'tempexpat' => $request->tempexpat,
            'entrepriseID' => $request->entrepriseID,
            'datefin' => $request->datefin,
            'scan' => $request->file('scan')->store('/public') ?? NULL,
        ]);

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
        $employes = Employes::where('entrepriseID', $id)->get();
        return \response()->json($employes);
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
        $employes = Employes::find($id);

        $find = Employes::where('date', $request->libelle)->where('date', '!=', $employes->date)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Cette date existe deja',
            ];
            return \response()->json($this->data);
        }

        $employes->fill($request->all());
        $employes->save();


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
        $employes = Employes::find($id);
        $employes->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
