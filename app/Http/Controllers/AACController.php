<?php

namespace App\Http\Controllers;

use App\Models\AAC;
use Illuminate\Http\Request;

class AACController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aAC = AAC::join('u_f_g_s', 'a_a_c_s.ufgID', '=', 'u_f_g_s.id')->get(['a_a_c_s.*', 'u_f_g_s.libelle as UFG']);
        return \response()->json($aAC);
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
        $find = AAC::where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }

        AAC::create($request->all());
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
        $aac = AAC::find($id);

        $find = AAC::where('libelle', '!=', $aac->libelle)->where('libelle', $request->libelle)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Ce libelle existe deja',
            ];
            return \response()->json($this->data);
        }

        $aac->fill($request->all());
        $aac->save();


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
        AAC::find($id)->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée'
        ];
        return \response()->json($this->data);
    }
}
