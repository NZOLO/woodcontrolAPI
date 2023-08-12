<?php

namespace App\Http\Controllers;

use App\Models\CNSS;
use Illuminate\Http\Request;

class CNSSController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cnss = CNSS::leftJoin('entreprises', 'c_n_s_s.entrepriseID', '=', 'entreprises.id')->get(['c_n_s_s.*', 'entreprises.raison']);
        return \response()->json($cnss);
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

        CNSS::create([
            'immatriculation' => $request->immatriculation,
            'datecreation' => $request->datecreation,
            'validite' => $request->validite,
            'entrepriseID' => $request->entrepriseID,
            'employe' => $request->employe,
            'montant' => $request->montant,
            'paye' => $request->paye,
            'quittance' => $request->quittance,
            'restant' => $request->restant,
            'delailegal' => $request->delailegal,
            'delaimoratoire' => $request->delaimoratoire,
            'scanquittance'  =>  $request->file('scanquittance')->store('/public') ?? NULL,
            'scanmoratoire'  =>  $request->file('scanmoratoire')->store('/public') ?? NULL,
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
        $cnss = CNSS::where('entrepriseID', $id)->get();
        return \response()->json($cnss);
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
        $cnss = CNSS::find($id);

        $cnss->fill($request->all());
        $cnss->save();


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
        $cnss = CNSS::find($id);
        $cnss->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
