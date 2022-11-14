<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpresaModel;
use Illuminate\Database\QueryException;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$empresas=EmpresaModel::get();*/
        $empresas = EmpresaModel::select('*')->orderBy('idEmpresa', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:10;

        if(isset($request->search)){
            $empresas = $empresas->where('idEmpresa', 'like', '%'.$request->search.'%')
            ->orWhere('razonSocial', 'like', '%'.$request->search.'%')
            ->orWhere('nombreCompleto', 'like', '%'.$request->search.'%')
            ->orWhere('direccion', 'like', '%'.$request->search.'%')
            ->orWhere('telefono', 'like', '%'.$request->search.'%')
            ->orWhere('correo', 'like', '%'.$request->search.'%');
        }
        $empresas = $empresas->paginate($limit)->appends($request->all());
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new EmpresaModel();
        $empresa = $this->createUpdateEmpresa($request, $empresa);
        return redirect()
        ->route('empresas.index')
        ->with('message', 'Su registro se ha creado');
    }

    public function createUpdateEmpresa(Request $request, $empresa){
        $empresa->razonSocial=$request->razonSocial;
        $empresa->nombreCompleto=$request->nombreCompleto;
        $empresa->direccion=$request->direccion;
        $empresa->telefono=$request->telefono;
        $empresa->correo=$request->correo;
        $empresa->save();
        return $empresa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa=EmpresaModel::where('idEmpresa', $id)->firstOrFail();
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa=EmpresaModel::where('idEmpresa', $id)->firstOrFail();
        return view('empresas.edit', compact('empresa'));
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
        $empresa=EmpresaModel::where('idEmpresa', $id)->firstOrFail();
        $empresa=$this->createUpdateEmpresa($request, $empresa);
        return redirect()
        ->route('empresas.index')
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
        $empresa=EmpresaModel::findOrFail($id);
        try{
            $empresa->delete();
            return redirect()    
            ->route('empresas.index')
            ->with('message', 'El registro se ha eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('empresas.index')
            ->with('danger', 'Imposible de eliminar registro.');
        }
    }
}
