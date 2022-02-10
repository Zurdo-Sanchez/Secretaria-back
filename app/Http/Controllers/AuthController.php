<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function signUp(Request $request)
    {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
    ]);

    return response()->json([
        'message' => 'Successfully created user!'
    ], 201);
}

/**
 * Inicio de sesión y creación de token
 */
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        'remember_me' => 'boolean'
    ]);

    $credentials = request(['email', 'password']);

    if (!Auth::attempt($credentials))
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);

    $user = $request->user();
    $tokenResult = $user->createToken('Personal Access Token');

    $token = $tokenResult->token;

    if ($request->remember_me)
        $token->expires_at = Carbon::now()->addWeeks(1);
    $token->save();

    return response()->json([
        'access_token' => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
    ]);
}

/**
 * Cierre de sesión (anular el token)
 */
public function logout(Request $request)
{
    $request->user()->token()->revoke();

    return response()->json([
        'message' => 'Successfully logged out'
    ]);
}

/**
 * Obtener el objeto User como json
 */
public function user(Request $request)
    {
        return response()->json($request->user());
    }


public function store(){

    $users = User::where("office_id","=","23")
    ->orderBy("name", "asc")
    ->get();

   return response()->json($users,201);
    }

public function edit(Request $request)
    {
        $Email = $request->email;
        $Password = $request->password;

        $credentials = request(['email', 'password']);

        $user = User::find($request->newId);


        if (!Auth::attempt($credentials))
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);

          $name = $request->newName;
          $email = $request->newEmail;
          $phone = $request->newPhone;
          $password = bcrypt($request->newPassword);

           $user->name = $name;
           $user->email = $email;

           if ($request->newPassword != null ) {
            $user->password = $password;
           }

           $user->phone = $phone;
           $user->save();

         return response()->json($user,200);

    }
}
