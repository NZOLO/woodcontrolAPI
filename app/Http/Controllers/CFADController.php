<?php

namespace App\Http\Controllers;

use App\Models\CFAD;
use App\Models\Entreprises;
use Illuminate\Http\Request;

class CFADController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cFAD = CFAD::join('entreprises', 'c_f_a_d_s.entrepriseID', '=', 'entreprises.id')->get(['c_f_a_d_s.*', 'entreprises.raison']);
        return \response()->json($cFAD);
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
        $find = CFAD::where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        CFAD::create($request->all());

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
        $cFAD = CFAD::where('entrepriseID', $id)->get();
        return \response()->json($cFAD);
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
        $cFAD = CFAD::find($id);

        $find = CFAD::where('libelle', '!=', $cFAD->libelle)->where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Cette CFAD existe deja',
            ];
            return \response()->json($this->data);
        }

        $cFAD->fill($request->all());
        $cFAD->save();


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
        $cFAD = CFAD::find($id);
        $cFAD->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
        ];
        return \response()->json($this->data);
    }
}
