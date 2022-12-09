<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use Illuminate\Database\QueryException;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->orderBy('idProducto', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $productos = $productos->where('idProducto', 'like', '%'.$request->search.'%')
            ->orWhere('nombre', 'like', '%'.$request->search.'%')
            ->orWhere('descripcion', 'like', '%'.$request->search.'%')
            ->orWhere('precio', 'like', '%'.$request->search.'%')
            ->orWhere('expiracion', 'like', '%'.$request->search.'%')
            ->orWhere('stock', 'like', '%'.$request->search.'%');
        }
        $productos = $productos->paginate($limit)->appends($request->all());
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new ProductoModel();
        $producto = $this->createUpdateProducto($request, $producto);
        return redirect()
        ->route('productos.index')
        ->with('message', 'Su registro se ha creado');
    }

    public function createUpdateProducto(Request $request, $producto){
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->expiracion=$request->expiracion;
        $producto->stock=$request->stock;
        $producto->save();
        return $producto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto=ProductoModel::where('idProducto', $id)->firstOrFail();
        $producto=$this->createUpdateProducto($request, $producto);
        return redirect()
        ->route('productos.index')
        ->with('message', 'Se ha actualizado el registro.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=ProductoModel::findOrFail($id);
        try{
            $producto->delete();
            return redirect()    
            ->route('productos.index')
            ->with('message', 'El registro se ha eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('productos.index')
            ->with('danger', 'Imposible de eliminar registro.');
        }
    }
}
