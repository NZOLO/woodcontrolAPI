<?php

namespace App\Http\Controllers;

use App\Models\Entreprises;
use App\Models\LigneActivite;
use Illuminate\Http\Request;

class EntreprisesController extends Controller
{

    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprises = Entreprises::all();
        return \response()->json($entreprises);
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
        $find = Entreprises::where('raison', $request->raison)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Cette entreprise existe déjà dans la base de donnees'
            ];

            return \response()->json($this->data);
        }
        $find = Entreprises::where('fiche', $request->fiche)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Cette entreprise existe déjà dans la base de donnees'
            ];
            return \response()->json($this->data);
        }

        $entrepriseID = Entreprises::create([
            'raison' => $request->raison,
            'sigle' => $request->sigle,
            'codebarre' => $request->codebarre,
            'typeStructures' => $request->typeStructures,
            'rccm' => $request->rccm,
            'nif' => $request->nif,
            'capital' => $request->capital,
            'origine' => $request->origine,
            'bp' => $request->bp,
            'adresseEntreprise' => $request->adresseEntreprise,
            'telephoneEntreprise' => $request->telephoneEntreprise,
            'emailEntreprise' => $request->emailEntreprise,
            'datecreation' => $request->datecreation,
            'nomgerant' => $request->nomgerant,
            'prenomgerant' => $request->prenomgerant,
            'piecegerant' => $request->piecegerant,
            'numpiecegerant' => $request->numpiecegerant,
            'datevaliditepiecegerant' => $request->datevaliditepiecegerant,
            'telephonegerant' => $request->telephonegerant,
            'adressegerant' => $request->adressegerant,
            'emailgerant' => $request->emailgerant,
            'type' => $request->type,
            'fiche' => $request->fiche,
            'scan' =>  $request->file('scan')->store('/public') ?? NULL,
            'immCNAMGS' => $request->immCNAMGS,
            'validiteCNAMGS' => $request->validiteCNAMGS,
            'justificatifCNAMGS' =>  $request->file('justificatifCNAMGS')->store('/public') ?? NULL,
            'immCNSS' => $request->immCNSS,
            'validiteCNSS' => $request->validiteCNSS,
            'justificatifCNSS' =>  $request->file('justificatifCNSS')->store('/public') ?? NULL,
            'pv'  => $request->file('pv')->store('/public') ?? NULL,
            'datesignature' => $request->datesignature,
            'nompresident' => $request->nompresident,
            'prenompresident' => $request->prenompresident,
            'telpresident' => $request->telpresident,
            'emailpresident' => $request->emailpresident,
            'nomsecretaire' => $request->nomsecretaire,
            'prenomsecretaire' => $request->prenomsecretaire,
            'telsecretaire' => $request->telsecretaire,
            'emailsecretaire' => $request->emailsecretaire,
            'nomtresorier' => $request->nomtresorier,
            'prenomtresorier' => $request->prenomtresorier,
            'teltresorier' => $request->teltresorier,
            'emailtresorier' => $request->emailtresorier,
        ])->id;

        if (count($request->activites) != 0) {
            foreach ($request->activites as $key) {
                LigneActivite::create([
                    'activiteID' => $key['activiteID'],
                    'entrepriseID' => $entrepriseID,
                ]);
            }
        }


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
        $entreprise = Entreprises::find($id);
        $this->data = [
            'code' => 0,
            'message' => 'affichage des informations',
            'data' => $entreprise
        ];
        return \response()->json($this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entreprise = Entreprises::find($id);
        $this->data = [
            'code' => 0,
            'message' => 'affichage des informations',
            'data' => $entreprise
        ];
        return \response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entreprise = Entreprises::find($id);

        $find = Entreprises::where('raison', '!=', $entreprise->raison)->where('raison', $request->raison)->count();
        if ($find > 0) {
            $this->data = [
                'code' => 1,
                'message' => 'Cette entreprise existe deja',
            ];
            return \response()->json($this->data);
        }

        $entreprise->fill($request->all());
        $entreprise->save();


        $this->data = [
            'code' => 0,
            'message' => 'Enregistrement effectué',
            'data' => $entreprise
        ];
        return \response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entreprise = Entreprises::find($id);
        $entreprise->delete();
        $this->data = [
            'code' => 0,
            'message' => 'Suppression effectuée',
            'data' => []
        ];
        return \response()->json($this->data);
    }
}
