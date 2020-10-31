<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulosModal;
use App\proveedorModal;

class articulosController extends Controller{
    public function index()
    {
        $articules = articulosModal::all();
        $provedor  = proveedorModal::all();
        return view('articulos.index',compact('articules','provedor'));
    }

    public function store(Request $request){

        $validator= $request->validate([
            'nombre'=>'required',
            'descripcion'=> 'required',
            'idProveedor' => 'required'
        ]);    
        $articulo = new articulosModal($request->all());
        $articulo->nombre         = $request->nombre;
        $articulo->descripcion    = $request->descripcion;
        $articulo->costo          = $request->costo;
        $articulo->idProveedor    = $request->idProveedor;
        $articulo->save();
        return redirect('/')
        ->with('success', 'Artículo agregado correctamente'); 
    }
    
    
    public function update(Request $request, $id)
    {
        $articulo = articulosModal::find($id);
        $articulo->nombre         = $request->nombre;
        $articulo->descripcion    = $request->descripcion;
        $articulo->idProveedor    = $request->idProveedor;
        $articulo->costo          = $request->costo;
        $articulo->update();      
        return redirect('/')
        ->with('success', 'Artículo actualizado correctamente'); ;
    }

    public function destroy($id)
    {
        $articulo = articulosModal::findOrFail($id);
        $articulo->delete();
        return redirect('/')
            ->with('success', 'Artículo eliminado correctamente'); 
    }
}
