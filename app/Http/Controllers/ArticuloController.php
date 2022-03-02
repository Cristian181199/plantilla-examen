<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    //

    public function index()
    {
        $articulos = Articulo::withCount('monografias')->get();

        return view('articulos.index', [
            'articulos' => $articulos,
        ]);
    }
}
