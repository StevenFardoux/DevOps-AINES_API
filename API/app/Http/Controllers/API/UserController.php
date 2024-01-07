<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request){
        try {
            $validateUser = Validator::make($request->all(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email|max:255',
                'password' => 'required|string|min:8'
            ]);

            if ($validateUser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=>'Erreur de validation',
                    'errors'=>$validateUser->errors()
                ],401);
            }

            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);


            return response()->json([
                'status'=> true,
                'message'=>'Utilisateur creer avec succes',
                'token'=> $user->createToken("API TOKEN")->plainTextToken
            ], 201);

        } catch (\Throwable $th){
            return response()->json([
                'status'=> false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function loginUser(Request $request){
        try {
            $validateUser = Validator::make($request->all(),
            [
                'email'=>'required|string|email|max:255',
                'password'=>'required|string|min:8'
            ]);

            if ($validateUser->fails()){
                return response()->json([
                    'status'=> false,
                    'message'=> 'Erreur de validation',
                    'errors'=> $validateUser->errors()
                ], 401);
            }

            if (!Auth::attempt($request->only(['email','password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email ou mot de passe incorrect.',
                ],401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Utilisateur connecter avec succes',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ],201);

        } catch (\Throwable $th){
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }

    }
}
