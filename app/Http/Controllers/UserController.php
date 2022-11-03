<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|string',
            'usuario' => 'required|string',
            'contrasenia' => 'required',
        ]);

        $input = $request->all();
        $input['contrasenia'] = bcrypt($input['contrasenia']);
        $user = User::create($input);

        return response()->json([
            'status' => true,
            'error' => 'Resource stored'
        ], 200);
        // return new UserResource(User::create($validated));
    }


    /**
     * Login function.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $request->validate([
            'usuario'=>'required',
            'contrasenia' => 'required'
        ]);

        $user = User::where('usuario', $request->usuario)->first();

        if(!$user || !Hash::check($request->contrasenia, $user->contrasenia) || $user->deleted_at)
        {

            throw ValidationException::withMessages([
                'error' => 'Resource not found',
            ]);

        }

        $token = $user->createToken($request->usuario, ['admin:admin'])->plainTextToken;
        return response()->json([
            'data'=>$user,
            'token'=>$token
        ], 201);


    }

    /**
     * Logout function.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        return response()->json(["bye"=>$request->user()->tokens()->delete()],200);
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new UserResource(User::find($id));
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'curp' => 'required|string',
            'localidad_id' => 'required',
        ]);

        try {
            $User = User::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);
            
        }

        if($User->update($validated))
            return new UserResource($User);
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {

            $User = User::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);

        }

        if($User->delete())
            return response()->json([
                'status' => true,
                'message' => 'Resource deleted'
            ], 200);

    }
}
