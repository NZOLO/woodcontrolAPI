<?php

namespace App\Http\Controllers;

use App\Models\LigneBordereau;
use Illuminate\Http\Request;

class LigneBordereauController extends Controller
{
    public $data = [];
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [];
        LigneBordereau::create($request->all());
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
        $ligne = LigneBordereau::find($id);
        $ligne->fill($request->all());
        $ligne->save();

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
        LigneBordereau::find($id)->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée'
        ];
        return \response()->json($this->data);
    }
}
