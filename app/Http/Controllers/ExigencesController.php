<?php

namespace App\Http\Controllers;

use App\Models\Exigences;
use Illuminate\Http\Request;

class ExigencesController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exigences = Exigences::leftJoin('entreprises', 'exigences.entrepriseID', '=', 'entreprises.id')->get(['exigences.*', 'entreprises.raison']);
        return \response()->json($exigences);
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

        Exigences::create($request->all());

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
        $exigences = Exigences::where('entrepriseID', $id)->get();
        return \response()->json($exigences);
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
        $exigences = Exigences::find($id);

        $exigences->fill($request->all());
        $exigences->save();


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
        $exigences = Exigences::find($id);
        $exigences->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
