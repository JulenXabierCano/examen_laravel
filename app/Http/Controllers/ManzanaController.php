<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;

class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index') -> with('manzanas', Manzana::all());
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
        Manzana::create([
            'tipoManzana' => $request->input('tipoManzana'),
            'precioKilo' => $request->input('precioKilo')
        ]);

        return redirect('/manzanas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzana $manzana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzana $manzana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $manzana)
    {
        $manzana = Manzana::find($manzana->id);
        $manzana -> update([
            'tipoManzana' => $manzana->tipoManzana . ' | Actualizado',
            'precioKilo' => 22
        ]);
        return redirect('/manzanas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(Request $manzana)
    {
        Manzana::find($manzana->id) -> delete();
        return redirect('/manzanas');
    }
}
