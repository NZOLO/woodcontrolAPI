<?php

namespace App\Http\Controllers;

use App\Models\LigneActivite;
use Illuminate\Http\Request;

class LigneActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];
        LigneActivite::create($request->all());
        $data = [
            'code' => 0,
            'message' => 'Enregistrement effectué',
        ];
        return \response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ligne = LigneActivite::join('activites', 'ligne_activites.activiteID', '=', 'activites.id')->join('entreprises', 'ligne_activites.entrepriseID', '=', 'entreprises.id')->where('ligne_activites.entrepriseID', $id)->get();
        return response()->json($ligne);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $find = LigneActivite::find($id);
        $find->delete();
    }
}
