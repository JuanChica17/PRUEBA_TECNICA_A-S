<?php

namespace App\Http\Controllers;

use App\Models\CategoriaDeProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaDeProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('categoria_de_productos')
        ->select('id','codigo', 'nombre', 'descripcion', 'activo')
        ->where('nombre', 'like', '%'.$texto.'%')
        ->orderBy('id')
        ->paginate();
        return view('categorias.index', compact('texto','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorias = new CategoriaDeProductos();
        $categorias->codigo = $request->codigo;
        $categorias->nombre = $request->nombre;
        $categorias->descripcion = $request->descripcion;
        $categorias->activo = $request->activo;
        $categorias->save();
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriaDeProductos  $categoriaDeProductos
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaDeProductos $categoriaDeProductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaDeProductos  $categoriaDeProductos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = CategoriaDeProductos::all();
        $categoriaRow = CategoriaDeProductos::find($id);
        return view('categorias.edit', compact('categorias','categoriaRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriaDeProductos  $categoriaDeProductos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaDeProductos $categoriaDeProductos)
    {
        $row = DB::table('categoria_de_productos')
        ->where('id', $request->id)
        ->update(['codigo'=> $request->codigo, 'nombre'=> $request->nombre, 'descripcion'=> $request->descripcion, 'activo'=> $request->activo ]);
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaDeProductos  $categoriaDeProductos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('categoria_de_productos')->where('id', '=', $id)->delete();
        return back();
    }
}
