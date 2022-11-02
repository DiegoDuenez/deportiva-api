<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\PersonaResource;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonaResource::collection(Persona::all());
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
            'apellidos' => 'required|string',
            'curp' => 'required|string',
            'localidad_id' => 'required',
        ]);

        return new PersonaResource(Persona::create($validated));
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new PersonaResource(Persona::find($id));

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
            $persona = Persona::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);
            
        }

        if($persona->update($validated))
            return new PersonaResource($persona);
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

            $persona = Persona::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);

        }

        if($persona->delete())
            return response()->json([
                'status' => true,
                'message' => 'Resource deleted'
            ], 200);

    }
}
