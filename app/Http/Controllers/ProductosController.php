<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\CategoriaDeProductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $rows = DB::table('productos')
        ->join('categoria_de_productos', 'productos.id_categoria', '=', 'categoria_de_productos.id')
        ->select('productos.*', 'categoria_de_productos.nombre AS nombreCategoria')
        ->where('productos.nombre', 'like', '%'.$texto.'%')
        ->orderBy('id')
        ->paginate();
        return view('productos.index', compact('texto','rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = CategoriaDeProductos::all();
        return view('productos.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Productos();
        $productos->codigo = $request->codigo;
        $productos->nombre = $request->nombre;
        $productos->descripcion = $request->descripcion;
        $productos->marca = $request->marca;
        $productos->id_categoria = $request->id_categoria;
        $productos->precio = $request->precio;
        $productos->save();
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaRows = CategoriaDeProductos::all();
        $productoRow = Productos::find($id);
        return view('productos.edit', compact('categoriaRows','productoRow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        $row = DB::table('productos')
        ->where('id', $request->id)
        ->update(['codigo'=> $request->codigo, 'nombre'=> $request->nombre, 'descripcion'=> $request->descripcion, 'marca'=> $request->marca, 'id_categoria'=> $request->id_categoria, 'precio'=> $request->precio ]);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('productos')->where('id', '=', $id)->delete();
        return back();
    }
}
