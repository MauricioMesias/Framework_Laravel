<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use Illuminate\Database\QueryException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = ClienteModel::select('*')->orderBy('idCliente', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $clientes = $clientes->where('idCliente', 'like', '%'.$request->search.'%')
            ->orWhere('nombre', 'like', '%'.$request->search.'%')
            ->orWhere('apellidoPaterno', 'like', '%'.$request->search.'%')
            ->orWhere('apellidoMaterno', 'like', '%'.$request->search.'%')
            ->orWhere('telefono', 'like', '%'.$request->search.'%')
            ->orWhere('correo', 'like', '%'.$request->search.'%')
            ->orWhere('direccion', 'like', '%' .$request->search. '%');
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new ClienteModel();
        $cliente = $this->createUpdateCliente($request, $cliente);
        return redirect()
        ->route('clientes.index')
        ->with('message', 'Su registro se ha creado');        
    }

    public function createUpdateCliente(Request $request, $cliente){
        $cliente->nombre=$request->nombre;
        $cliente->apellidoPaterno=$request->apellidoPaterno;
        $cliente->apellidoMaterno=$request->apellidoMaterno;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->direccion=$request->direccion;
        $cliente->save();
        return $cliente;
    }

    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        return view('clientes.edit', compact('cliente'));
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
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        $cliente=$this->createUpdateCliente($request, $cliente);
        return redirect()
        ->route('clientes.index')
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
        $cliente=ClienteModel::findOrFail($id);
        try{
            $cliente->delete();
            return redirect()    
            ->route('clientes.index')
            ->with('message', 'El registro se ha eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('clientes.index')
            ->with('danger', 'Imposible de eliminar registro.');
        }
    }
}
