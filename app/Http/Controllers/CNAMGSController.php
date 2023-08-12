<?php

namespace App\Http\Controllers;

use App\Models\CNAMGS;
use Illuminate\Http\Request;

class CNAMGSController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cnamgs = CNAMGS::leftJoin('entreprises', 'c_n_a_m_g_s.entrepriseID', '=', 'entreprises.id')->get(['c_n_a_m_g_s.*', 'entreprises.raison']);
        return \response()->json($cnamgs);
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

        CNAMGS::create([
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
        $cnamgs = CNAMGS::where('entrepriseID', $id)->get();
        return \response()->json($cnamgs);
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
        $cnamgs = CNAMGS::find($id);

        $cnamgs->fill($request->all());
        $cnamgs->save();


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
        $cnamgs = CNAMGS::find($id);
        $cnamgs->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
