<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articulosModal;
use App\proveedorModal;

class proveedoresController extends Controller{
    
    public function index(){
        $provedor  = proveedorModal::all();
        return view('proveedores.index',compact('provedor'));
    }

    
    public function store(Request $request){
        $validator= $request->validate([
            'nombre'=>'required',
            'categoria'=> 'required'
        ]);    
        $provedor = new proveedorModal($request->all());
        $provedor->nombre         = $request->nombre;
        $provedor->categoria    = $request->categoria;
        $provedor->save();
        return redirect('/proveedores')
        ->with('success', 'Proveedor agregado correctamente'); 
    }

    public function update(Request $request, $id){
        $provedor = proveedorModal::find($id);
        $provedor->nombre         = $request->nombre;
        $provedor->categoria    = $request->categoria;
        $provedor->update();      
        return redirect('/proveedores')
        ->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy($id){
        $provedor = proveedorModal::findOrFail($id);
        $provedor->delete();
        return redirect('/proveedores')
            ->with('success', 'Proveedor eliminado correctamente'); 
    }
}
