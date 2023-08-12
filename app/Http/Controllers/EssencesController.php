<?php

namespace App\Http\Controllers;

use App\Models\Essences;
use Illuminate\Http\Request;

class EssencesController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $essences = Essences::all();
        return \response()->json($essences);
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
        $find = Essences::where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        Essences::create($request->all());

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
        $essences = Essences::find($id);

        $find = Essences::where('libelle', $request->libelle)->where('libelle', '!=', $essences->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe deja',
            ];
            return \response()->json($this->data);
        }

        $essences->fill($request->all());
        $essences->save();


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
        $essences = Essences::find($id);
        $essences->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
