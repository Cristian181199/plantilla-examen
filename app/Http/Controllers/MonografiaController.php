<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonografiaRequest;
use App\Http\Requests\UpdateMonografiaRequest;
use App\Models\Monografia;
use Illuminate\Http\Request;

class MonografiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monografias.index', [
            'monografias' => Monografia::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monografias.create', [
            'monografia' => new Monografia(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonografiaRequest $request)
    {
        $validados = $request->validated();
        $monografia = new Monografia($validados);
        $monografia->save();

        return redirect()->route('monografias.index')->with('success', '!Monografia creada con exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Monografia $monografia)
    {
        return view('monografias.show', [
            'monografia' => $monografia,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Monografia $monografia)
    {
        return view('monografias.edit', [
            'monografia' => $monografia,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonografiaRequest $request, Monografia $monografia)
    {
        $validados = $request->validated();
        $monografia->titulo = $validados['titulo'];
        $monografia->anyo = $validados['anyo'];
        $monografia->save();

        return redirect()->route('monografias.index')->with('success', '!Tema editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monografia $monografia)
    {
        if ($monografia->articulos()->count() === 0) {

            $monografia->delete();
            return redirect()->route('monografias.index')->with('success', 'Monografia eliminado con exito.');

        }
        return redirect()->route('monografias.index')->with('error', 'Esta monografia tiene articulos asociados.');
    }

    public function monografia_autores(Monografia $monografia)
    {
        $monografias = Monografia::with('articulos')->with('autores');

        return view('monografias.monografia', [
            'monografias' => $monografias,
        ]);
    }
}
