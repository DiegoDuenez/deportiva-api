<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\MembresiaResource;
use Illuminate\Http\Request;
use App\Models\Membresia;


class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MembresiaResource::collection(Membresia::all());
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required',
        ]);

        return new MembresiaResource(Membresia::create($validated));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return new MembresiaResource(Membresia::find($id));

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
            'tipo' => 'required',
        ]);

        try {
            $membresia = Membresia::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);
            
        }

        if($membresia->update($validated))
            return new MembresiaResource($membresia);
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

            $membresia = Membresia::findOrFail($id);

        } catch (ModelNotFoundException $exception) {

            return response()->json([
                'status' => false,
                'error' => 'Resource not found'
            ], 404);

        }

        if($membresia->delete())
            return response()->json([
                'status' => true,
                'message' => 'Resource deleted'
            ], 200);
    }
}
