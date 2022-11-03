<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\PersonaActividadResource;
use Illuminate\Http\Request;
use App\Models\PersonaActividad;

class PersonaActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonaActividadResource::collection(PersonaActividad::all());
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new PersonaActividadResource(PersonaActividad::find($id));
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
            'persona_id' => 'required',
            'actividad_id' => 'required',
            'pago_id' => 'required',
        ]);

        return new PersonaActividadResource(PersonaActividad::create($validated));
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'persona_id' => 'required',
            'actividad_id' => 'required',
            'pago_id' => 'required',
        ]);

        try {
            $PersonaActividad = PersonaActividad::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);
            
        }

        if($PersonaActividad->update($validated))
            return new PersonaActividadResource($PersonaActividad);
        
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

            $PersonaActividad = PersonaActividad::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);

        }

        if($PersonaActividad->delete())
            return response()->json([
                'status' => true,
                'message' => 'Resource deleted'
            ], 200);

    }
}
