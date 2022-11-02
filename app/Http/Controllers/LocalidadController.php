<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Resources\LocalidadResource;
use Illuminate\Http\Request;
use App\Models\Localidad;

class LocalidadController extends Controller
{


    
    /**
     * Display all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LocalidadResource::collection(Localidad::all());
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new LocalidadResource(Localidad::find($id));
    }


    
    /**
     * Store a new resource.
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required',
        ]);

        return new LocalidadResource(Localidad::create($validated));
    }
    


    /**
     * Update a existing resoruce.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'tipo' => 'required',
        ]);

        $localidad = Localidad::findOrFail($id);
        $localidad->update($validated);
        return new LocalidadResource($localidad);
    }
        

}
