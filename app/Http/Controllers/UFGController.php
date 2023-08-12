<?php

namespace App\Http\Controllers;

use App\Models\UFG;
use Illuminate\Http\Request;

class UFGController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uFG = UFG::join('c_f_a_d_s', 'u_f_g_s.cfadID', '=', 'c_f_a_d_s.id')->join('entreprises', 'u_f_g_s.entrepriseID', '=', 'entreprises.id')->get(['u_f_g_s.*', 'c_f_a_d_s.libelle as CFAD', 'entreprises.raison']);
        return \response()->json($uFG);
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
        $find = UFG::where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        UFG::create($request->all());
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
        $uFG = UFG::where('cfadID', $id)->join('entreprises', 'u_f_g_s.entrepriseID', '=', 'entreprises.id')->get(['u_f_g_s.*', 'entreprises.raison']);
        return \response()->json($uFG);
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
        $uFG = UFG::find($id);

        $find = UFG::where('libelle', '!=', $uFG->libelle)->where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe deja',
            ];
            return \response()->json($this->data);
        }

        $uFG->fill($request->all());
        $uFG->save();


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
        UFG::find($id)->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée'
        ];
        return \response()->json($this->data);
    }
}
