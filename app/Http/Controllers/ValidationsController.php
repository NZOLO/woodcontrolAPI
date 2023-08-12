<?php

namespace App\Http\Controllers;

use App\Models\Validations;
use Illuminate\Http\Request;

class ValidationsController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validations = Validations::join('users', 'validations.agentID', '=', 'users.id')->join('bordereaus', 'validations.agentID', '=', 'bordereaus.id')->get(['validations.*', 'bordereaus.num_bord', 'users.name']);
        return \response()->json($validations);
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
        Validations::create($request->all());
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
        $validations = Validations::find($id);
        $validations->statut = $request->statut;
        $validations->save();
        $this->data = [
            'code' => 0,
            'message' => 'Enregistrement effectué'
        ];
        return \response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $validations = Validations::find($id)->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée'
        ];
        return \response()->json($this->data);
    }
}
