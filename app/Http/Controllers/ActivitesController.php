<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites = Activites::leftJoin('entreprises', 'activites.entrepriseID', '=', 'entreprises.id')->get(['activites.*', 'entreprises.raison']);
        return \response()->json($activites);
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
        $find = Activites::where('libelle', $request->date)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Vous avez deja fait un enregistrement de ce type'
            ];

            return \response()->json($this->data);
        }

        Activites::create($request->all());

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
        $activites = Activites::where('entrepriseID', $id)->get();
        return \response()->json($activites);
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
        $activites = Activites::find($id);
        $activites->fill($request->all());
        $activites->save();


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
        $activites = Activites::find($id);
        $activites->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
