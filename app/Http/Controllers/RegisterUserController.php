<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $count = \count($user);
        if ($count == 0) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 0,
            ]);
        }

        $data = [];

        $services = Services::all();
        $user = User::leftJoin('services', 'users.serviceID', '=', 'services.id')->get(['users.*', 'services.libelle as Service']);
        $data = [
            'services' => $services,
            'user' => $user
        ];
        return \response()->json($data);
    }

    public function verified(Request $request)
    {
        $data = [];
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $data = [
                'code' => 1,
                'message' => 'Vous ne faites pas partie des admnistrateurs de ce site'
            ];

            return \response()->json($data);
        }
        if (!Hash::check($request->password, $user->password)) {
            $data = [
                'code' => 1,
                'message' => 'Mot de passe ou identifiant ne correspond pas'
            ];
            return \response()->json($data);
        } else {
            $data = [
                'code' => 0,
                'message' => 'success',
                'data' => [
                    'user' => $user
                ]
            ];

            return \response()->json($data);
        }
    }

    public function save(Request $request)
    {
        $data = [];
        $find = User::where('email', $request->email)->count();
        if ($find > 0) {
            $data = [
                'code' => 1,
                'message' => 'Ce libelle existe déjà dans la base de donnees'
            ];

            return \response()->json($data);
        }

        User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'role' =>  $request->role,
            'serviceID' =>  $request->serviceID,
        ]);

        $data = [
            'code' => 0,
            'message' => 'Enregistrement effectué'
        ];
        return \response()->json($data);
    }

    public function updateUser(Request $request, $id)
    {

        $data = [];
        $user = User::find($id);

        $find = User::where('email', '!=', $user->email)->where('raison', $request->email)->count();
        if ($find > 0) {
            $data = [
                'code' => 1,
                'message' => 'Cet Agent existe deja',
            ];
            return \response()->json($data);
        }

        $user->fill($request->all());
        $user->save();


        $data = [
            'code' => 0,
            'message' => 'Enregistrement effectué',
            'data' => $user
        ];
        return \response()->json($data);
    }

    public function destroy($id)
    {
        $find = User::find($id);
        $find->delete();
        $data = [];
        $data = [
            'code' => 0,
            'message' => 'Enregistrement effectué'
        ];
        return \response()->json($data);
    }

    public function password(Request $request)
    {
        $find = User::findOrFail($request->id);

        if (!Hash::check($request->oldpassword, $find->password)) {
            $data = [
                'code' => 1,
                'message' => 'Mot de passe ne correspond pas'
            ];
            return \response()->json($data);
        } else {
            $find->password = Hash::make($request->newpassword);
            $data = [
                'code' => 0,
                'message' => 'Enregistrement effectué'
            ];
            return \response()->json($data);
        }
    }
}
